<?php

namespace App\Libraries;

use App\Models\CmsPage;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Utils
{
    // core
    public static function generateToken()
    {
        return md5(uniqid(mt_rand(0, mt_getrandmax()), true));
    }

    public static function getStates()
    {
        return [
            'ACT' => 'ACT',
            'NSW' => 'NSW',
            'NT'  => 'NT',
            'QLD' => 'QLD',
            'SA'  => 'SA',
            'TAS' => 'TAS',
            'VIC' => 'VIC',
            'WA'  => 'WA',
        ];
    }

    public static function getMonths()
    {
        return [
            '01' => '01',
            '02' => '02',
            '03' => '03',
            '04' => '04',
            '05' => '05',
            '06' => '06',
            '07' => '07',
            '08' => '08',
            '09' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12'
        ];
    }

    public static function getDays()
    {
        $days = [];

        for ($i = 1; $i <= 31; $i++) {
            $val = ($i < 10) ? '0' . $i : $i;
            $days[$val] = $val;
        }

        return $days;
    }

    public static function formatFigure($number, $symbol = '', $fractional = false)
    {
        if ($fractional) {
            $number = sprintf('%.2f', $number);
        }
        while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced !== $number) {
                $number = $replaced;
            } else {
                break;
            }
        }

        return $symbol . $number;
    }

    // cms
    public static function getContentableTypes()
    {
        return [
            'App\Models\CmsContent'   => 'Text',
            'App\Models\CmsGallery'   => 'Gallery',
            'App\Models\CmsAccordion' => 'Accordion',
            'App\Models\CmsSlider'    => 'Slider',
            'App\Models\CmsTileGroup' => 'Tile Group',
        ];
    }

    public static function randomPassword()
    {
        $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = 8;

        $str = '';
        $count = strlen($charset);

        while ($length--) {
            $str .= $charset[mt_rand(0, $count - 1)];
        }

        return $str;
    }

    public static function retainUniqueData($string, $model, $column)
    {
        $string = '_' . $string;
        $i = 1;
        while (!is_null($model->where($column, '=', $string)->first())) {
            $string = '_' . $string;
            $i++;
        }

        return $string;
    }

    public static function defaultSortOrder($model)
    {
        $sort_order = $model->max('sort_order') + 1;

        return $sort_order;
    }

    public static function getBoxPositions()
    {
        return [
            'top-left'      => 'Top Left',
            'top-center'    => 'Top Center',
            'top-right'     => 'Top Right',
            'center-left'   => 'Center Left',
            'center-center' => 'Center Center',
            'center-right'  => 'Center Right',
            'bottom-left'   => 'Bottom Left',
            'bottom-center' => 'Bottom Center',
            'bottom-right'  => 'Bottom Right',
        ];
    }

    public static function getColours()
    {
        return [
            "#EB4034" => "Red",
            "#2C5BDB" => "Blue",
            "#0BD931" => "Green",
            "#000000" => "Black",
            "#FFFFFF" => "White",
            "#FC8E08" => "Orange",
            "#FFEF08" => "Yellow",
            "#A615BF" => "Purple"
        ];
    }

    public static function getChildPages($label)
    {
        $page = CmsPage::where("label", $label)->first();
        $pages = new Collection();
        foreach ($page->children as $child)
            $pages = Utils::addPages($child, $pages);

        return $pages;
    }

    public static function addPages($page, $pages)
    {
        $pages->push($page);
        foreach ($page->children as $child)
            $pages = Utils::addPages($child, $pages);
        return $pages;
    }

    /**
     * If we've got an incomplete order, load it
     * If we've added stuff to our cart before logging in, associate that cart with this user
     *
     * @param \App\Models\User $user
     * @return void
     */
    public static function syncCart(User $user)
    {
        if ($order = Order::where('user_id', $user->id)->where('state', 'cart')->first()) {
            foreach ($order->items as $item)
                if (!$item->product)
                    $item->delete();
            session(['token' => $order->token]);
        } elseif ($order = Order::where('token', session('token'))->first())
            $order->update([
                'user_id'               => $user->id,
                'email'                 => $user->email,
                'shipping_address_id'   => $user->shipping_address_id,
                'billing_address_id'    => $user->billing_address_id
            ]);
    }
}
