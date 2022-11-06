<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <title> Order Placed </title>
  <!--[if !mso]><!-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    #outlook a {
      padding: 0;
    }

    body {
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    p {
      display: block;
      margin: 13px 0;
    }
  </style>
  <!--[if mso]>
    <noscript>
    <xml>
    <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    </noscript>
    <![endif]-->
  <!--[if lte mso 11]>
    <style type="text/css">
      .mj-outlook-group-fix { width:100% !important; }
    </style>
    <![endif]-->
  <style type="text/css">
    @media only screen and (min-width:475px) {
      .mj-column-per-100 {
        width: 100% !important;
        max-width: 100%;
      }

      .mj-column-per-50 {
        width: 50% !important;
        max-width: 50%;
      }
    }
  </style>
  <style media="screen and (min-width:475px)">
    .moz-text-html .mj-column-per-100 {
      width: 100% !important;
      max-width: 100%;
    }

    .moz-text-html .mj-column-per-50 {
      width: 50% !important;
      max-width: 50%;
    }
  </style>
  <style type="text/css">
  </style>
  <style type="text/css">
  </style>
</head>

<body style="word-spacing:normal;">
  <div style="">
    <!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#0A2636" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
    <div style="background:#0A2636;background-color:#0A2636;margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#0A2636;background-color:#0A2636;width:100%;">
        <tbody>
          <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
              <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
              <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:1;text-align:left;color:#333333;">{!! env('APP_NAME') !!}</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--[if mso | IE]></td></tr></table><![endif]-->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
    <div style="margin:0px auto;max-width:600px;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
        <tbody>
          <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
              <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
              <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:28px;font-weight:600;line-height:1;text-align:left;color:#333333;">Order Placed</div>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:16px;line-height:24px;text-align:left;color:#333333;">Hi!</div>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:16px;line-height:24px;text-align:left;color:#333333;">A new order has been placed on the site: <strong>#{!! $order->number !!}</strong>.<br /> If you want to view it online, you can do so <a href="{!! url('/admin/orders/'. $order->id . '/show') !!}">here after logging in</a>.</div>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:18px;font-weight:600;line-height:1;text-align:left;color:#333333;">Order #{!! $order->number !!}</div>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <table cellpadding="0" cellspacing="0" width="100%" border="0" style="color:#333333;font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:22px;table-layout:auto;width:100%;border:none;">
                          <tr style="border-bottom:2px solid #ecedee;text-align:left;padding:16px 0;">
                            <th style="text-align:left">Product</th>
                            <th style="text-align:center">Qty</th>
                            <th style="text-align:right"></th>
                          </tr> @foreach($order->items as $item) <tr>
                            <td style="text-align:left;width: 60%;"> {!! $item->details['name'] !!} <small>{!! $item->details['summary'] !!}</small>
                            </td>
                            <td style="text-align:center">{!! $item->quantity !!}</td>
                            <td style="text-align:right">${!! $item->quantity * $item->price !!}</td>
                          </tr> @endforeach
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--[if mso | IE]></td><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
              <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tbody>
                    <tr>
                      <td align="right" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <table cellpadding="0" cellspacing="0" width="100%" border="0" style="color:#333333;font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:22px;table-layout:auto;width:100%;border:none;">
                          <tr style="border-bottom:1px solid #ecedee">
                            <td style="font-weight: 500">{!! $order->cart_count !!}</td>
                            <td style="text-align: right">${!! $order->item_total !!}</td>
                          </tr> @if($order->coupon && $order->coupon_discount) <tr style="border-bottom:1px solid #ecedee">
                            <td style="font-weight: 500">Coupon ({!! $order->coupon->code !!})</td>
                            <td style="text-align: right">&minus;{!! '$' . $order->coupon_discount !!}</td>
                          </tr> @endif <tr style="border-bottom:1px solid #ecedee">
                            <td style="font-weight: 500">Shipping ({!! $order->shippingMethod->name !!})</td>
                            <td style="text-align: right">${!! $order->shipping_total !!}</td>
                          </tr>
                          <tr style="border-bottom:1px solid #ecedee">
                            <td style="font-weight: 500">Total</td>
                            <td style="text-align: right">${!! $order->total !!}</td>
                          </tr>
                          <tr>
                            <td> @if($order->payment_method === "credit_card") <p><small style="color: grey;text-align: right">Paid via Credit Card</small></p> @elseif($order->payment_method === "paypal") <p><small style="color: grey;text-align: right">Paid via PayPal</small></p> @endif </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--[if mso | IE]></td><td class="" style="vertical-align:top;width:300px;" ><![endif]-->
              <div class="mj-column-per-50 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:1;text-align:left;color:#333333;">
                          <h3>Shipping Address</h3>
                          <span>{!! $order->shippingAddress->name !!}</span><br />
                          <span>{!! $order->shippingAddress->company !!}</span><br />
                          <span>{!! $order->shippingAddress->address1 !!}</span><br />
                          <span>{!! $order->shippingAddress->address2 !!}</span><br />
                          <span>{!! $order->shippingAddress->city_suburb !!}</span> <span>{!! $order->shippingAddress->state !!}</span> <span>{!! $order->shippingAddress->postcode !!}</span> <br />
                          <span>{!! $order->shippingAddress->country->getName() !!}</span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--[if mso | IE]></td><td class="" style="vertical-align:top;width:300px;" ><![endif]-->
              <div class="mj-column-per-50 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                  <tbody>
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:1;text-align:left;color:#333333;">
                          <h3>Billing Address</h3>
                          <span>{!! $order->billingAddress->name !!}</span><br />
                          <span>{!! $order->billingAddress->company !!}</span><br />
                          <span>{!! $order->billingAddress->address1 !!}</span><br />
                          <span>{!! $order->billingAddress->address2 !!}</span><br />
                          <span>{!! $order->billingAddress->city_suburb !!}</span> <span>{!! $order->billingAddress->state !!}</span> <span>{!! $order->billingAddress->postcode !!}</span> <br />
                          <span>{!! $order->billingAddress->country->getName() !!}</span>
                        </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--[if mso | IE]></td></tr></table><![endif]-->
    </td>
    </tr>
    </tbody>
    </table>
  </div>
  <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" role="presentation" style="width:600px;" width="600" bgcolor="#0A2636" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
  <div style="background:#0A2636;background-color:#0A2636;margin:0px auto;max-width:600px;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#0A2636;background-color:#0A2636;width:100%;">
      <tbody>
        <tr>
          <td style="direction:ltr;font-size:0px;padding:10px;text-align:center;">
            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:580px;" ><![endif]-->
            <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
              <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                <tbody>
                  <tr>
                    <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                      <div style="font-family:Volte, Helvetica, sans-serif;font-size:12px;line-height:1;text-align:center;color:#333333;"><a href="{!! url(env('APP_URL')) !!}" style="text-decoration: none; color: #183052; font-weight: 600;">{!! url(env('APP_URL')) !!}</a></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--[if mso | IE]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--[if mso | IE]></td></tr></table><![endif]-->
  </div>
</body>

</html>