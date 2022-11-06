<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * The layout used by the controller.
     *
     * @var \Illuminate\View\View
     */
    protected $layout = 'layouts.master';

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = view($this->layout);
        }
    }

    /**
     * Render the view content on the layout.
     *
     * @param  string $path
     * @param  array  $data
     *
     * @return void
     */
    public function view($path, $data = [])
    {
        if (!is_null($this->layout)) {
            $this->layout->nest('child', $path, $data);
        }

        view($path, $data);
    }

    /**
     * Redirect to the specified named route.
     *
     * @param  string $route
     * @param  array  $params
     * @param  array  $data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectRoute($route, $params = [], $data = [])
    {
        return redirect()->route($route, $params)->with($data);
    }

    /**
     * Redirect to the specified route.
     *
     * @param  string $route
     * @param  array  $data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectTo($route, $data = [])
    {
        return redirect($route)->with($data);
    }

    /**
     * Redirect back with old input and the specified data.
     *
     * @param  array $data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBack($data = [])
    {
        return back()->withInput()->with($data);
    }

    /**
     * Redirect back with old input and the error data.
     *
     * @param  array $data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBackWithErrors($data = [])
    {
        return back()->withInput()->withErrors($data);
    }

    /**
     * Redirect a logged in user to the previously intended url.
     *
     * @param  mixed $default
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectIntended($default = null)
    {
        return redirect()->intended($default);
    }

    /**
     * Execute an action on the controller.
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);

        if (is_null($response) && !is_null($this->layout)) {
            $response = $this->layout;
        }

        return $response;
    }
}
