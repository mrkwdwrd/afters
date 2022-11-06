/**
 * ------------------------------------------------------------------------------
 * Initialisation for cart/checkout components
 * ------------------------------------------------------------------------------
 */
$(function () {
  // Disable/hide empty state selects
  $('select.state-select').each((e, elem) => {
    if (!$(elem).children('option').length) {
      $(elem).closest('fieldset').attr('disabled', true).hide();
    }
  });

  // Populate state select options if country is selected on page load
  $('select.country-select').each((e, elem) => {
    getStates(elem.value).then(states => updateStateSelect(elem, states));
  });

  // Show/hide the billing address fields based on checkbox value on page load
  if ($('#shipping_billing_same').length) {
    if ($('#shipping_billing_same').is(':checked')) {
      $('#billing-address').hide();
    } else {
      $('#billing-address').show();
    }
  }
});

/**
 * ------------------------------------------------------------------------------
 * Baseline js events for cart/checkout components
 * ------------------------------------------------------------------------------
 */

// Get variant price, dynamically update
$(document).on('change', '#select-variant', event => {
  const id = $(event.target).val();
  getVariantById(id).then(data => {
    updateVariantPrice(data);
  }).catch(error => {
    console.error(error);
  })
});

// Add item to cart, dynamically update cart items/qtys/totals
$(document).on('click', '#add-to-cart button', () => {
  const type = $('#add-to-cart [name=orderable_type]').val();
  const id = $('#add-to-cart [name=orderable_id]').val();
  const qty = $('#add-to-cart [name=qty]').val();
  if (qty <= 0) {
    $('#add-to-cart [name=qty]').val(1);
    return false;
  }
  addToCart(type, id, qty).then(data => {
    updateCartValues(data);
  }).catch(error => {
    console.error(error);
  }).finally(() => {});
});

// Remove item from cart, dynamically update cart items/qtys/totals
// Triggered from the user's preview cart
$(document).on('click', '#preview-cart .item-remove button', event => {
  const item = $(event.target).data('item');
  removeFromCart(item).then(data => {
    updateCartValues(data);
    $(event.target).closest('li').remove();
  }).catch(error => {
    console.error(error);
  }).finally(() => {});
});

// Remove item from cart, refresh to update cart items/qtys/totals
// Triggered from the user's checkout cart
$(document).on('click', '#checkout-cart .item-remove button', event => {
  const item = $(event.target).data('item');
  removeFromCart(item).then(data => {
    location.reload();
  }).catch(error => {
    console.error(error);
  }).finally(() => {});
});

// Populate state select options when country is selected
$(document).on('change', 'select.country-select', event => {
  getStates(event.target.value).then(states => updateStateSelect(event.target, states));
});

// Show/hide the billing address fields based on checkbox
$(document).on('change', '#shipping_billing_same', function () {
  if ($(this).is(':checked')) {
    $('#billing-address').hide();
  } else {
    $('#billing-address').show();
  }
});

/**
 * ------------------------------------------------------------------------------
 * DOM manipulation for dynamic cart updates
 * ------------------------------------------------------------------------------
 */

// Dynamic update variant price on add to cart form
const updateVariantPrice = (data) => {
  const price = data.sale_price ? data.sale_price : data.price;
  const orig_price = data.sale_price ? data.price : null;
  const is_on_sale = !!data.sale_price
  const max_qty = data.max_qty
  $('#add-to-cart #variant-price .price').html(`$${price}`);
  $('#add-to-cart #variant-qty').val(1).attr('max', max_qty);
  if (is_on_sale) {
    const elem = $('#add-to-cart #variant-price .price').clone();
    $('#add-to-cart #variant-price').addClass('on-sale');
    // $('#add-to-cart #variant-price .price.original').html(orig_price);
    $('#add-to-cart #variant-price').prepend($(elem).addClass('original').html(`$${orig_price}`));
  } else {
    $('#add-to-cart #variant-price').removeClass('on-sale');
    // $('#add-to-cart #variant-price .price.original').html('');
    $('#add-to-cart #variant-price .price.original').remove();
  }
}

// Dynamic update of user's preview cart
const updateCartValues = (data) => {
  $('#preview-cart .cart-summary .items').html(data.cart_count);
  $('#preview-cart .cart-summary .total').html(data.total);
  if (data.is_empty) {
    $('#preview-cart').removeClass('has-items');
  } else {
    $('#preview-cart').addClass('has-items');
  }
  if (data.item) {
    insertCartItem(data.item);
  }
  $('#preview-cart').addClass('active');
  setTimeout(() => $('#preview-cart').removeClass('active'), 2000);
}

// Dynamic insert of item into user's preview cart
const insertCartItem = (item) => {
  var current = $(`#preview-cart .cart-items #item-${item.id}`)
  if (current.length) {
    current.find('.qty').html(item.quantity);
    current.find('.price').html(item.total);
  } else {
    var template = $('#cart-item-template').html()
      .replace(/{id}/g, item.id)
      .replace(/{productName}/g, item.details.name)
      .replace(/{variantSummary}/g, item.details.summary)
      .replace(/{itemQuantity}/g, item.quantity)
      .replace(/{itemTotal}/g, item.total.toFixed(2));
    $(template).appendTo($('#preview-cart .cart-items'));
  }
}

// Create and insert options from states array
const updateStateSelect = (elem, states) => {
  const stateSelect = $('#' + $(elem).data('target'));
  let options = '';
  stateSelect.find('option').remove();
  if (Object.keys(states).length) {
    options += '<option value="">Please select...</option>';
    $.each(states, function (key, value) {
      options += '<option value="' + value + '">' + value + '</option>';
    });
    stateSelect.append(options).closest('fieldset').removeAttr('disabled').show();
  } else {
    stateSelect.closest('fieldset').attr('disabled', true).hide();
  }
}


/**
 * ------------------------------------------------------------------------------
 * Actions for setting/getting data
 * ------------------------------------------------------------------------------
 */

const getVariantById = id => {
  return new Promise ((resolve, reject) => {
    $.get(`/variant/${id}`)
      .done(response => resolve(JSON.parse(response)))
      .fail(error => reject(error.responseJSON));
  });
}

const addToCart = (type, id, qty) => {
  return new Promise((resolve, reject) => {
    $.post(`/cart/add`, { orderable_type: type, orderable_id: id, quantity: qty })
      .done(response => resolve(response))
      .fail(error => reject(error.responseJSON));
  });
}

const removeFromCart = (id) => {
  return new Promise((resolve, reject) => {
    $.post(`/cart/remove`, { id: id })
      .done(response => resolve(response))
      .fail(error => reject(error.responseJSON));
  });
}

const getStates = (code) => {
  return new Promise((resolve, reject) => {
    $.get(`/countries/${code}/states`)
    .done(response => resolve(response))
    .fail(error => reject(error.responseJSON));
  })
}
