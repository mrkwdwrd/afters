<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class AdminBaseController extends BaseController
{
    /**
     * The layout used by admin controllers.
     *
     * @var \Illuminate\View\View
     */
    protected $layout = 'admin.layouts.master';
}
