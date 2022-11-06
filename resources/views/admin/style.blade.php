@extends('admin.layouts.master')

@section('content')
<div id="style-guide">
  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Section header -->
      <div class="section-head">
          <div class="content">
              <h2 class="mb-2">Column layouts</h2>
              <div class="text-sm md:text-base">
                  <p>All styling and component classes built using Tailwind CSS.</p>
              </div>
          </div>
          <a class="button bg-white flex-shrink-0 px-4 py-2" href="https://tailwindcss.com/docs/" target="_blank" title="Tailwind CSS Documentation">
            <svg class="h-8 inline" viewBox="0 0 273 64" fill="none" xmlns="http://www.w3.org/2000/svg">
              <title>Tailwind CSS</title>
              <path fill="url(#paint0_linear)" fill-rule="evenodd" clip-rule="evenodd" d="M32 16C24.8 16 20.3 19.6 18.5 26.8C21.2 23.2 24.35 21.85 27.95 22.75C30.004 23.2635 31.4721 24.7536 33.0971 26.4031C35.7443 29.0901 38.8081 32.2 45.5 32.2C52.7 32.2 57.2 28.6 59 21.4C56.3 25 53.15 26.35 49.55 25.45C47.496 24.9365 46.0279 23.4464 44.4029 21.7969C41.7557 19.1099 38.6919 16 32 16ZM18.5 32.2C11.3 32.2 6.8 35.8 5 43C7.7 39.4 10.85 38.05 14.45 38.95C16.504 39.4635 17.9721 40.9536 19.5971 42.6031C22.2443 45.2901 25.3081 48.4 32 48.4C39.2 48.4 43.7 44.8 45.5 37.6C42.8 41.2 39.65 42.55 36.05 41.65C33.996 41.1365 32.5279 39.6464 30.9029 37.9969C28.2557 35.3099 25.1919 32.2 18.5 32.2Z"></path>
              <path fill="#2D3748" fill-rule="evenodd" clip-rule="evenodd" d="M85.996 29.652H81.284V38.772C81.284 41.204 82.88 41.166 85.996 41.014V44.7C79.688 45.46 77.18 43.712 77.18 38.772V29.652H73.684V25.7H77.18V20.596L81.284 19.38V25.7H85.996V29.652ZM103.958 25.7H108.062V44.7H103.958V41.964C102.514 43.978 100.272 45.194 97.308 45.194C92.14 45.194 87.846 40.824 87.846 35.2C87.846 29.538 92.14 25.206 97.308 25.206C100.272 25.206 102.514 26.422 103.958 28.398V25.7ZM97.954 41.28C101.374 41.28 103.958 38.734 103.958 35.2C103.958 31.666 101.374 29.12 97.954 29.12C94.534 29.12 91.95 31.666 91.95 35.2C91.95 38.734 94.534 41.28 97.954 41.28ZM114.902 22.85C113.458 22.85 112.28 21.634 112.28 20.228C112.28 18.784 113.458 17.606 114.902 17.606C116.346 17.606 117.524 18.784 117.524 20.228C117.524 21.634 116.346 22.85 114.902 22.85ZM112.85 44.7V25.7H116.954V44.7H112.85ZM121.704 44.7V16.96H125.808V44.7H121.704ZM152.446 25.7H156.778L150.812 44.7H146.784L142.832 31.894L138.842 44.7H134.814L128.848 25.7H133.18L136.866 38.81L140.856 25.7H144.77L148.722 38.81L152.446 25.7ZM161.87 22.85C160.426 22.85 159.248 21.634 159.248 20.228C159.248 18.784 160.426 17.606 161.87 17.606C163.314 17.606 164.492 18.784 164.492 20.228C164.492 21.634 163.314 22.85 161.87 22.85ZM159.818 44.7V25.7H163.922V44.7H159.818ZM178.666 25.206C182.922 25.206 185.962 28.094 185.962 33.034V44.7H181.858V33.452C181.858 30.564 180.186 29.044 177.602 29.044C174.904 29.044 172.776 30.64 172.776 34.516V44.7H168.672V25.7H172.776V28.132C174.03 26.156 176.082 25.206 178.666 25.206ZM205.418 18.1H209.522V44.7H205.418V41.964C203.974 43.978 201.732 45.194 198.768 45.194C193.6 45.194 189.306 40.824 189.306 35.2C189.306 29.538 193.6 25.206 198.768 25.206C201.732 25.206 203.974 26.422 205.418 28.398V18.1ZM199.414 41.28C202.834 41.28 205.418 38.734 205.418 35.2C205.418 31.666 202.834 29.12 199.414 29.12C195.994 29.12 193.41 31.666 193.41 35.2C193.41 38.734 195.994 41.28 199.414 41.28ZM223.278 45.194C217.54 45.194 213.246 40.824 213.246 35.2C213.246 29.538 217.54 25.206 223.278 25.206C227.002 25.206 230.232 27.144 231.752 30.108L228.218 32.16C227.382 30.374 225.52 29.234 223.24 29.234C219.896 29.234 217.35 31.78 217.35 35.2C217.35 38.62 219.896 41.166 223.24 41.166C225.52 41.166 227.382 39.988 228.294 38.24L231.828 40.254C230.232 43.256 227.002 45.194 223.278 45.194ZM238.592 30.944C238.592 34.402 248.814 32.312 248.814 39.342C248.814 43.142 245.508 45.194 241.404 45.194C237.604 45.194 234.868 43.484 233.652 40.748L237.186 38.696C237.794 40.406 239.314 41.432 241.404 41.432C243.228 41.432 244.634 40.824 244.634 39.304C244.634 35.922 234.412 37.822 234.412 31.02C234.412 27.448 237.49 25.206 241.366 25.206C244.482 25.206 247.066 26.65 248.396 29.158L244.938 31.096C244.254 29.614 242.924 28.93 241.366 28.93C239.884 28.93 238.592 29.576 238.592 30.944ZM256.11 30.944C256.11 34.402 266.332 32.312 266.332 39.342C266.332 43.142 263.026 45.194 258.922 45.194C255.122 45.194 252.386 43.484 251.17 40.748L254.704 38.696C255.312 40.406 256.832 41.432 258.922 41.432C260.746 41.432 262.152 40.824 262.152 39.304C262.152 35.922 251.93 37.822 251.93 31.02C251.93 27.448 255.008 25.206 258.884 25.206C262 25.206 264.584 26.65 265.914 29.158L262.456 31.096C261.772 29.614 260.442 28.93 258.884 28.93C257.402 28.93 256.11 29.576 256.11 30.944Z"></path>
              <defs>
                <linearGradient id="paint0_linear" x1="3.5" y1="16" x2="59" y2="48" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#2298BD"></stop>
                  <stop offset="1" stop-color="#0ED7B5"></stop>
                </linearGradient>
              </defs>
            </svg>
        </a>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Section header -->
      <div class="section-head">
          <div class="content">
              <h2 class="mb-2">Column layouts</h2>
              <div class="text-sm md:text-base">
                  <p>Use for praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
              </div>
          </div>
      </div>
    </textarea>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Subsection header -->
      <div class="w-full mt-8 mb-4 px-2">
        <h3>Single column layout</h3>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Subsection header -->
      <div class="w-full mt-8 mb-4 px-2">
        <h3>Single column layout</h3>
      </div>
    </textarea>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Full width column -->
      <div class="card-group">
        <div class="card-col w-full">
          <div class="card-head">
            Full Width
          </div>
          <div class="card">
            Full width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Full width column -->
      <div class="card-group">
        <div class="card-col w-full">
          <div class="card-head">
            Full Width
          </div>
          <div class="card">
            Full width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <!-- Two columns -->
  <div class="w-full mt-8 mb-4 px-2">
    <h3>Two column layouts</h3>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Two columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/2">
          <div class="card-head">
            Half Width Fixed
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
        <div class="card-col w-1/2">
          <div class="card-head">
            Half Width Fixed
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Two columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/2">
          <div class="card-head">
            Half Width Fixed
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
        <div class="card-col w-1/2">
          <div class="card-head">
            Half Width Fixed
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Two columns responsive -->
      <div class="card-group">
        <div class="card-col w-full sm:w-1/2">
          <div class="card-head">
            Half Width Responsive
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/2">
          <div class="card-head">
            Half Width Responsive
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Two columns responsive -->
      <div class="card-group">
        <div class="card-col w-full sm:w-1/2">
          <div class="card-head">
            Half Width Responsive
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/2">
          <div class="card-head">
            Half Width Responsive
          </div>
          <div class="card">
            Half width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <!-- Three columns -->
  <div class="w-full mt-8 mb-4 px-2">
    <h3>Three column layouts</h3>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Three columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Three columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-1/3">
          <div class="card-head">
            One-third Width
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Three columns responsive -->
      <div class="card-group">
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Three columns responsive -->
      <div class="card-group">
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
        <div class="card-col w-full sm:w-1/3">
          <div class="card-head">
            One-third Width Responsive
          </div>
          <div class="card">
            One-third width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <!-- Four columns -->
  <div class="w-full mt-8 mb-4 px-2">
    <h3>Four column layout</h3>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Four columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Four columns fixed -->
      <div class="card-group">
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/4">
          <div class="card-head">
            One-quarter Width
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Four columns responsive -->
      <div class="card-group">
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Four columns responsive -->
      <div class="card-group">
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
        <div class="card-col w-1/2 md:w-1/4">
          <div class="card-head">
            One-quarter Width Responsive
          </div>
          <div class="card">
            One-quarter width column
          </div>
        </div>
      </div>
    </textarea>
  </div>

  <div class="section-head">
    <div class="content">
      <h2 class="mb-2">Form elements</h2>
    </div>
  </div>

  <div class="card-group">
    <div class="card-col w-full">
      <div class="card">

        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
              <!-- Text input -->
              <fieldset class="mb-6 px-1">
                {!! Form::label('text-field', 'Text Field', ['class' => 'field-label']) !!}
                {!! Form::text('text-field', null, ['class' => 'field-input', 'placeholder' => 'Text Field']) !!}
                <span class="field-error">Field is required!</span>
                <span class="field-tip">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</span>
              </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Text input -->
            <fieldset class="mb-6 px-1">
              &lbrace;!! Form::label('text-field', 'Text Field', ['class' => 'field-label']) !!&rbrace;
              &lbrace;!! Form::text('text-field', null, ['class' => 'field-input', 'placeholder' => 'Text Field']) !!&rbrace;
              <span class="field-error">Field is required!</span>
              <span class="field-tip">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</span>
            </fieldset>
          </textarea>
        </div>

        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Password input -->
              <fieldset class="mb-6 px-1">
                {!! Form::label('password-field', 'Password Field', ['class' => 'field-label']) !!}
                {!! Form::password('password-field', ['class' => 'field-input', 'placeholder' => 'Password Field']) !!}
              </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Password input -->
            <fieldset class="mb-6 px-1">
              &lbrace;!! Form::label('password-field', 'Password Field', ['class' => 'field-label']) !!&rbrace;
              &lbrace;!! Form::password('password-field', ['class' => 'field-input', 'placeholder' => 'Password Field']) !!&rbrace;
            </fieldset>
          </textarea>
        </div>

        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Text area-->
            <fieldset class="w-full mb-6 px-1">
              {!! Form::label('text-area', 'Text Area', ['class' => 'field-label']) !!}
              {!! Form::textarea('text-area', null, ['class' => 'field-input', 'placeholder' => 'Text Area']) !!}
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Text area-->
            <fieldset class="w-full mb-6 px-1">
              &lbrace;!! Form::label('text-area', 'Text Area', ['class' => 'field-label']) !!&rbrace;
              &lbrace;!! Form::textarea('text-area', null, ['class' => 'field-input', 'placeholder' => 'Text Area']) !!&rbrace;
            </fieldset>
          </textarea>
        </div>

        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Content area-->
            <fieldset class="mb-6 px-1">
                {!! Form::label('content-area', 'Content Area', ['class' => 'field-label']) !!}
                {!! Form::textarea('content-area', null, ['class' => 'field-input froala_editor', 'placeholder' => 'Content Area']) !!}
                <span class="field-tip">Uses Froala: <a href="https://www.froala.com/wysiwyg-editor/docs/overview" target="_blank">https://www.froala.com/wysiwyg-editor/docs/overview</a></span>
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Content area-->
            <fieldset class="mb-6 px-1">
                &lbrace;!! Form::label('content-area', 'Content Area', ['class' => 'field-label']) !!&rbrace;
                &lbrace;!! Form::textarea('content-area', null, ['class' => 'field-input froala_editor', 'placeholder' => 'Content Area']) !!&rbrace;
                <span class="field-tip">Uses Froala: <a href="https://www.froala.com/wysiwyg-editor/docs/overview" target="_blank">https://www.froala.com/wysiwyg-editor/docs/overview</a></span>
            </fieldset>
          </textarea>
        </div>

        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Content area lite-->
            <fieldset class="mb-6 px-1">
                {!! Form::label('content-area', 'Content Area Lite', ['class' => 'field-label']) !!}
                {!! Form::textarea('content-area', null, ['class' => 'field-input froala_editor lite', 'placeholder' => 'Content Area']) !!}
                <span class="field-tip">Uses Froala: <a href="https://www.froala.com/wysiwyg-editor/docs/overview" target="_blank">https://www.froala.com/wysiwyg-editor/docs/overview</a></span>
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Content area lite-->
            <fieldset class="mb-6 px-1">
                &lbrace;!! Form::label('content-area', 'Content Area Lite', ['class' => 'field-label']) !!&rbrace;
                &lbrace;!! Form::textarea('content-area', null, ['class' => 'field-input froala_editor lite', 'placeholder' => 'Content Area']) !!&rbrace;
                <span class="field-tip">Uses Froala: <a href="https://www.froala.com/wysiwyg-editor/docs/overview" target="_blank">https://www.froala.com/wysiwyg-editor/docs/overview</a></span>
            </fieldset>
          </textarea>
        </div>


        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Select -->
            <fieldset class="w-full mb-6 px-1">
              {!! Form::label('select', 'Select', ['class' => 'field-label']) !!}
              {!! Form::select('select', [
                '' => 'Please select...',
                '1' => 'Option one',
                '2' => 'Option two',
                '3' => 'Option three',
                '4' => 'Option four'],
              null, ['multiple', 'class' => 'selectize']) !!}
              <span class="field-tip">Uses Selectize.js: <a href="https://github.com/selectize/selectize.js" target="_blank">https://github.com/selectize/selectize.js</a></span>
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Select -->
            <fieldset class="w-full mb-6 px-1">
              &lbrace;!! Form::label('select', 'Select', ['class' => 'field-label']) !!&rbrace;
              &lbrace;!! Form::select('select', [
                '' => 'Please select...',
                '1' => 'Option one',
                '2' => 'Option two',
                '3' => 'Option three',
                '4' => 'Option four'],
              null, ['multiple', 'class' => 'selectize']) !!&rbrace;
              <span class="field-tip">Uses Selectize.js: <a href="https://github.com/selectize/selectize.js" target="_blank">https://github.com/selectize/selectize.js</a></span>
            </fieldset>
          </textarea>
        </div>


        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Tags -->
            <fieldset class="mb-6 px-1">
              {!! Form::label('tags', 'Tags', ['class' => 'field-label']) !!}
              {!! Form::select('tags[]', [
                '1' => 'Tag one',
                '2' => 'Tag two',
                '3' => 'Tag three',
                '4' => 'Tag four'],
              ['1','3'], ['multiple', 'class' => 'selectize tag', 'placeholder' => 'Tags']) !!}
              <span class="field-tip">Uses Selectize.js: <a href="https://github.com/selectize/selectize.js" target="_blank">https://github.com/selectize/selectize.js</a></span>
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Tags -->
            <fieldset class="mb-6 px-1">
              &lbrace;!! Form::label('tags', 'Tags', ['class' => 'field-label']) !!&rbrace;
              &lbrace;!! Form::select('tags[]', [
                '1' => 'Tag one',
                '2' => 'Tag two',
                '3' => 'Tag three',
                '4' => 'Tag four'],
              ['1','3'], ['multiple', 'class' => 'selectize tag', 'placeholder' => 'Tags']) !!&rbrace;
              <span class="field-tip">Uses Selectize.js: <a href="https://github.com/selectize/selectize.js" target="_blank">https://github.com/selectize/selectize.js</a></span>
            </fieldset>
          </textarea>
        </div>

        <div class="flex flex-wrap w-full">
          <div class="copy-container w-1/2">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Radio set -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('radio-set', 'Radio Set', ['class' => 'field-label']) !!}
                <div id="radio-set" class="set-block">
                    <label class="set-label">
                      {!! Form::radio('radio', '1', null, ['class' => 'set-input']) !!}
                      One
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radio', '2', null, ['class' => 'set-input']) !!}
                      Two
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radio', '3', null, ['class' => 'set-input']) !!}
                      Three
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radio', '4', null, ['class' => 'set-input']) !!}
                      Four
                    </label>
                </div>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Radio set -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('radio-set', 'Radio Set', ['class' => 'field-label']) !!&rbrace;
                <div id="radio-set" class="set-block">
                    <label class="set-label">
                      &lbrace;!! Form::radio('radio', '1', null, ['class' => 'set-input']) !!&rbrace;
                      One
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radio', '2', null, ['class' => 'set-input']) !!&rbrace;
                      Two
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radio', '3', null, ['class' => 'set-input']) !!&rbrace;
                      Three
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radio', '4', null, ['class' => 'set-input']) !!&rbrace;
                      Four
                    </label>
                </div>
              </fieldset>
            </textarea>
          </div>

          <div class="copy-container w-1/2">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Checkbox set -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('checkbox-set', 'Checkbox Set', ['class' => 'field-label']) !!}
                <div id="checkbox-set" class="set-block">
                    <label class="set-label">
                      {!! Form::checkbox('checkbox1', true, null, ['class' => 'set-input']) !!}
                      One
                    </label>
                    <label class="set-label">
                      {!! Form::checkbox('checkbox2', true, null, ['class' => 'set-input']) !!}
                      Two
                    </label>
                    <label class="set-label">
                      {!! Form::checkbox('checkbox4', true, null, ['class' => 'set-input']) !!}
                      Three
                    </label>
                    <label class="set-label">
                      {!! Form::checkbox('checkbox4', true, null, ['class' => 'set-input']) !!}
                      Four
                    </label>
                </div>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Checkbox set -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('checkbox-set', 'Checkbox Set', ['class' => 'field-label']) !!&rbrace;
                <div id="checkbox-set" class="set-block">
                    <label class="set-label">
                      &lbrace;!! Form::checkbox('checkbox1', true, null, ['class' => 'set-input']) !!&rbrace;
                      One
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::checkbox('checkbox2', true, null, ['class' => 'set-input']) !!&rbrace;
                      Two
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::checkbox('checkbox4', true, null, ['class' => 'set-input']) !!&rbrace;
                      Three
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::checkbox('checkbox4', true, null, ['class' => 'set-input']) !!&rbrace;
                      Four
                    </label>
                </div>
              </fieldset>
            </textarea>
          </div>
        </div>

        <div class="flex flex-wrap w-full">
          <div class="copy-container w-1/2">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Inline radio set -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('radio-set-inline', 'Radio Set Inline', ['class' => 'field-label']) !!}
                <div id="radio-set-inline" class="set-inline">
                    <label class="set-label">
                      {!! Form::radio('radioinline', '1', null, ['class' => 'set-input']) !!}
                      One
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radioinline', '2', null, ['class' => 'set-input']) !!}
                      Two
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radioinline', '3', null, ['class' => 'set-input']) !!}
                      Three
                    </label>
                    <label class="set-label">
                      {!! Form::radio('radioinline', '4', null, ['class' => 'set-input']) !!}
                      Four
                    </label>
                </div>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Inline radio set -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('radio-set-inline', 'Radio Set Inline', ['class' => 'field-label']) !!&rbrace;
                <div id="radio-set-inline" class="set-inline">
                    <label class="set-label">
                      &lbrace;!! Form::radio('radioinline', '1', null, ['class' => 'set-input']) !!&rbrace;
                      One
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radioinline', '2', null, ['class' => 'set-input']) !!&rbrace;
                      Two
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radioinline', '3', null, ['class' => 'set-input']) !!&rbrace;
                      Three
                    </label>
                    <label class="set-label">
                      &lbrace;!! Form::radio('radioinline', '4', null, ['class' => 'set-input']) !!&rbrace;
                      Four
                    </label>
                </div>
              </fieldset>
            </textarea>
          </div>

          <div class="copy-container w-1/2">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Inline checkbox set -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('checkbox-set-inline', 'Checkbox Set Inline', ['class' => 'field-label']) !!}
                <div id="checkbox-set-inline" class="set-inline">
                    <label class="inline-block set-label">
                      {!! Form::checkbox('checkboxinline1', true, null, ['class' => 'set-input']) !!}
                      One
                    </label>
                    <label class="inline-block set-label">
                      {!! Form::checkbox('checkboxinline2', true, null, ['class' => 'set-input']) !!}
                      Two
                    </label>
                    <label class="inline-block set-label">
                      {!! Form::checkbox('checkboxinline4', true, null, ['class' => 'set-input']) !!}
                      Three
                    </label>
                    <label class="inline-block set-label">
                      {!! Form::checkbox('checkboxinline4', true, null, ['class' => 'set-input']) !!}
                      Four
                    </label>
                </div>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Inline checkbox set -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('checkbox-set-inline', 'Checkbox Set Inline', ['class' => 'field-label']) !!&rbrace;
                <div id="checkbox-set-inline" class="set-inline">
                    <label class="inline-block set-label">
                      &lbrace;!! Form::checkbox('checkboxinline1', true, null, ['class' => 'set-input']) !!&rbrace;
                      One
                    </label>
                    <label class="inline-block set-label">
                      &lbrace;!! Form::checkbox('checkboxinline2', true, null, ['class' => 'set-input']) !!&rbrace;
                      Two
                    </label>
                    <label class="inline-block set-label">
                      &lbrace;!! Form::checkbox('checkboxinline4', true, null, ['class' => 'set-input']) !!&rbrace;
                      Three
                    </label>
                    <label class="inline-block set-label">
                      &lbrace;!! Form::checkbox('checkboxinline4', true, null, ['class' => 'set-input']) !!&rbrace;
                      Four
                    </label>
                </div>
              </fieldset>
            </textarea>
          </div>
        </div>
        <div class="flex flex-wrap w-full">

          <div class="copy-container w-1/3">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Date picker -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('date-picker', 'Date Picker', ['class' => 'field-label']) !!}
                {!! Form::text('date-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Date Picker' ]) !!}
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Date picker -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('date-picker', 'Date Picker', ['class' => 'field-label']) !!&rbrace;
                &lbrace;!! Form::text('date-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Date Picker' ]) !!&rbrace;
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </textarea>
          </div>

          <div class="copy-container w-1/3">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Date/time picker -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('datetime-picker', 'Date & Time Picker', ['class' => 'field-label']) !!}
                {!! Form::text('datetime-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Date & Time Picker', 'data-enable-time' => 'true',]) !!}
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Date/time picker -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('datetime-picker', 'Date & Time Picker', ['class' => 'field-label']) !!&rbrace;
                &lbrace;!! Form::text('datetime-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Date & Time Picker', 'data-enable-time' => 'true',]) !!&rbrace;
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </textarea>
          </div>

          <div class="copy-container w-1/3">
            <a class="copy-code fa fa-copy"></a>
            <div class="display-block">
              <!-- Time picker -->
              <fieldset class="mb-6 px-1 w-full">
                {!! Form::label('time-picker', 'Time Picker', ['class' => 'field-label']) !!}
                {!! Form::text('time-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Time Picker',
                  'data-enable-time' => 'true',
                  'data-no-calendar' => 'true',
                  'data-date-format' => 'H:i:S',
                  'data-alt-input' => 'true',
                  'data-alt-format' => 'h:i K',
                ]) !!}
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </div>
            <textarea class="copy-block">
              <!-- Time picker -->
              <fieldset class="mb-6 px-1 w-full">
                &lbrace;!! Form::label('time-picker', 'Time Picker', ['class' => 'field-label']) !!&rbrace;
                &lbrace;!! Form::text('time-picker', null, ['class' => 'field-input flatpickr', 'placeholder' => 'Time Picker',
                  'data-enable-time' => 'true',
                  'data-no-calendar' => 'true',
                  'data-date-format' => 'H:i:S',
                  'data-alt-input' => 'true',
                  'data-alt-format' => 'h:i K',
                ]) !!&rbrace;
                <span class="field-tip">Uses Flatpickr: <a href="https://github.com/flatpickr/flatpickr" target="_blank">https://github.com/flatpickr/flatpickr</a></span>
              </fieldset>
            </textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-head">
      <div class="content">
          <h2 class="mb-2">Buttons</h2>
      </div>
  </div>
  <div class="card-group">
    <div class="card-col w-full">
      <div class="card">
        <div class="mt-2 mb-4 px-1 w-full">
          <h4>Primary</h4>
        </div>
        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Primary buttons -->
            <fieldset class="mb-4 px-1">
              {!! Form::button('Cancel', ['class' => 'button red']) !!}
              {!! Form::button('Submit', ['class' => 'button blue']) !!}
              {!! Form::button('Create', ['class' => 'button green']) !!}
              {!! Form::button('Publish', ['class' => 'button yellow']) !!}
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Primary buttons -->
            <fieldset class="mb-4 px-1">
              &lbrace;!! Form::button('Cancel', ['class' => 'button red']) !!&rbrace;
              &lbrace;!! Form::button('Submit', ['class' => 'button blue']) !!&rbrace;
              &lbrace;!! Form::button('Create', ['class' => 'button green']) !!&rbrace;
              &lbrace;!! Form::button('Publish', ['class' => 'button yellow']) !!&rbrace;
            </fieldset>
          </textarea>
        </div>
        <div class="mt-2 mb-4 px-1 w-full">
          <h4>Light</h4>
        </div>
        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Light buttons -->
            <fieldset class="mb-4 px-1">
              {!! Form::button('Cancel', ['class' => 'button red light']) !!}
              {!! Form::button('Submit', ['class' => 'button blue light']) !!}
              {!! Form::button('Create', ['class' => 'button green light']) !!}
              {!! Form::button('Publish', ['class' => 'button yellow light']) !!}
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Light buttons -->
            <fieldset class="mb-4 px-1">
              &lbrace;!! Form::button('Cancel', ['class' => 'button red light']) !!&rbrace;
              &lbrace;!! Form::button('Submit', ['class' => 'button blue light']) !!&rbrace;
              &lbrace;!! Form::button('Create', ['class' => 'button green light']) !!&rbrace;
              &lbrace;!! Form::button('Publish', ['class' => 'button yellow light']) !!&rbrace;
            </fieldset>
          </textarea>
        </div>

        <div class="mt-2 mb-4 px-1 w-full">
          <h4>Thin</h4>
        </div>
        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Thin buttons -->
            <fieldset class="mb-4 px-1">
              {!! Form::button('Cancel', ['class' => 'button red thin']) !!}
              {!! Form::button('Submit', ['class' => 'button blue thin']) !!}
              {!! Form::button('Create', ['class' => 'button green thin']) !!}
              {!! Form::button('Publish', ['class' => 'button yellow thin']) !!}
            </fieldset>
          </div>
          <textarea class="copy-block">
            <!-- Thin buttons -->
            <fieldset class="mb-4 px-1">
              &lbrace;!! Form::button('Cancel', ['class' => 'button red thin']) !!&rbrace;
              &lbrace;!! Form::button('Submit', ['class' => 'button blue thin']) !!&rbrace;
              &lbrace;!! Form::button('Create', ['class' => 'button green thin']) !!&rbrace;
              &lbrace;!! Form::button('Publish', ['class' => 'button yellow thin']) !!&rbrace;
            </fieldset>
          </textarea>
        </div>
        <span class="field-tip">Classes can be applied to both &lt;button&gt; and &lt;a&gt; tags.</span>
      </div>
    </div>
  </div>

  <div class="section-head">
      <div class="content">
          <h2 class="mb-2">Lists</h2>
      </div>
  </div>

  <div class="card-group">
    <div class="card-col w-full sm:w-1/2">
      <div class="card">
        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Unordered list -->
            <div class="mb-4 px-1 w-full">
              <h3>Unordered list</h3>
            </div>
            <ul class="list-hierarchy">
              <li>
                <span>
                    <span>
                        Item 1
                    </span>
                    <span class="buttons">
                        <a href="" class="text-red-500" title="Delete date"><i class="fa fa-trash"></i></a>
                    </span>
                </span>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Two</a>
                </span>
                <ul>
                  <li>
                    <span>
                      <span>
                          Second Level Item One
                      </span>
                      <span class="buttons">
                          <a href="" class="text-red-500" title="Delete date"><i class="fa fa-trash"></i></a>
                      </span>
                    </span>
                  </li>
                  <li>
                    <span>
                      <a href="#" title="Child Item">Second Level Item Two</a>
                    </span>
                    <ul>
                      <li>
                        <span>
                          <a href="#" title="Child Item">Third Level Item</a>
                        </span>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Three</a>
                </span>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Four</a>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="card-col w-full sm:w-1/2">
      <div class="card">
        <div class="copy-container">
          <a class="copy-code fa fa-copy"></a>
          <div class="display-block">
            <!-- Ordered list -->
            <div class="mb-4 px-1 w-full">
              <h3>Ordered list</h3>
            </div>
            <ol class="list-hierarchy">
              <li>
                <span>
                    <span>
                        Item 1
                    </span>
                    <span class="buttons">
                        <a href="" class="text-red-500" title="Delete date"><i class="fa fa-trash"></i></a>
                    </span>
                </span>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Two</a>
                </span>
                <ul>
                  <li>
                    <span>
                      <span>
                          Second Level Item One
                      </span>
                      <span class="buttons">
                          <a href="" class="text-red-500" title="Delete date"><i class="fa fa-trash"></i></a>
                      </span>
                    </span>
                  </li>
                  <li>
                    <span>
                      <a href="#" title="Child Item">Second Level Item Two</a>
                    </span>
                    <ul>
                      <li>
                        <span>
                          <a href="#" title="Child Item">Third Level Item</a>
                        </span>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Three</a>
                </span>
              </li>
              <li>
                <span>
                  <a href="#" title="Item">Item Four</a>
                </span>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copy-container">
    <a class="copy-code fa fa-copy"></a>
    <div class="display-block">
      <!-- Pagination list -->
      <div class="mb-4 px-1 w-full">
        <h3>Pagination</h3>
      </div>
      <div class="card-group">
        <div class="card-col w-full">
          <ul class="pagination">
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
              <div class="flex justify-between flex-1 sm:hidden">
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                  « Previous
                </span>
                <a href="?page=2" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                  Next »
                </a>
              </div>
              <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                  <p class="text-sm text-gray-700 leading-5">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">20</span> of <span class="font-medium">26</span> results
                  </p>
                </div>
                <div>
                  <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                      <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                      </span>
                    </span>
                    <span aria-current="page">
                      <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">1</span>
                    </span>
                    <a href="?page=2" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="Go to page 2">2</a>
                    <a href="?page=2" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next &amp;raquo;">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    </a>
                  </span>
                </div>
              </div>
            </nav>
          </ul>
        </div>
      </div>
    </div>
    <textarea class="copy-block">
      <!-- Pagination -->
      <div class="card-group">
        <div class="card-col w-full">
          <ul class="pagination">
              &lbrace;!! $collection->appends(request()->query())->links() !!&rbrace;
          </ul>
        </div>
      </div>
    </textarea>
  </div>

  <div class="section-head">
      <div class="content">
          <h2 class="mb-2">Icons</h2>
      </div>
  </div>

  <div class="card-group">
    <div class="card-col w-full">
      <div class="card">
        <div class="flex flex-wrap">
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-500px"></i><span><code class="code-block mt-2">fa fa-500px</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-address-book"></i><span><code class="code-block mt-2">fa fa-address-book</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-address-book-o"></i><span><code class="code-block mt-2">fa fa-address-book-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-adjust"></i><span><code class="code-block mt-2">fa fa-adjust</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-adn"></i><span><code class="code-block mt-2">fa fa-adn</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-align-center"></i><span><code class="code-block mt-2">fa fa-align-center</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-align-justify"></i><span><code class="code-block mt-2">fa fa-align-justify</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-align-left"></i><span><code class="code-block mt-2">fa fa-align-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-align-right"></i><span><code class="code-block mt-2">fa fa-align-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-amazon"></i><span><code class="code-block mt-2">fa fa-amazon</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ambulance"></i><span><code class="code-block mt-2">fa fa-ambulance</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-anchor"></i><span><code class="code-block mt-2">fa fa-anchor</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-android"></i><span><code class="code-block mt-2">fa fa-android</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angellist"></i><span><code class="code-block mt-2">fa fa-angellist</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-double-down"></i><span><code class="code-block mt-2">fa fa-angle-double-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-double-left"></i><span><code class="code-block mt-2">fa fa-angle-double-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-double-right"></i><span><code class="code-block mt-2">fa fa-angle-double-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-double-up"></i><span><code class="code-block mt-2">fa fa-angle-double-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-down"></i><span><code class="code-block mt-2">fa fa-angle-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-left"></i><span><code class="code-block mt-2">fa fa-angle-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-right"></i><span><code class="code-block mt-2">fa fa-angle-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-angle-up"></i><span><code class="code-block mt-2">fa fa-angle-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-apple"></i><span><code class="code-block mt-2">fa fa-apple</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-archive"></i><span><code class="code-block mt-2">fa fa-archive</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-area-chart"></i><span><code class="code-block mt-2">fa fa-area-chart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-down"></i><span><code class="code-block mt-2">fa fa-arrow-circle-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-left"></i><span><code class="code-block mt-2">fa fa-arrow-circle-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-o-down"></i><span><code class="code-block mt-2">fa fa-arrow-circle-o-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-o-left"></i><span><code class="code-block mt-2">fa fa-arrow-circle-o-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-o-right"></i><span><code class="code-block mt-2">fa fa-arrow-circle-o-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-o-up"></i><span><code class="code-block mt-2">fa fa-arrow-circle-o-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-right"></i><span><code class="code-block mt-2">fa fa-arrow-circle-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-circle-up"></i><span><code class="code-block mt-2">fa fa-arrow-circle-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-down"></i><span><code class="code-block mt-2">fa fa-arrow-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-left"></i><span><code class="code-block mt-2">fa fa-arrow-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-right"></i><span><code class="code-block mt-2">fa fa-arrow-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrow-up"></i><span><code class="code-block mt-2">fa fa-arrow-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrows"></i><span><code class="code-block mt-2">fa fa-arrows</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrows-alt"></i><span><code class="code-block mt-2">fa fa-arrows-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrows-h"></i><span><code class="code-block mt-2">fa fa-arrows-h</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-arrows-v"></i><span><code class="code-block mt-2">fa fa-arrows-v</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-asl-interpreting fa-american-sign-language-interpreting"></i><span><code class="code-block mt-2">fa fa-asl-interpreting fa-american-sign-language-interpreting</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-assistive-listening-systems"></i><span><code class="code-block mt-2">fa fa-assistive-listening-systems</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-asterisk"></i><span><code class="code-block mt-2">fa fa-asterisk</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-at"></i><span><code class="code-block mt-2">fa fa-at</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-audio-description"></i><span><code class="code-block mt-2">fa fa-audio-description</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-automobile fa-car"></i><span><code class="code-block mt-2">fa fa-automobile fa-car</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-backward"></i><span><code class="code-block mt-2">fa fa-backward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-balance-scale"></i><span><code class="code-block mt-2">fa fa-balance-scale</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ban"></i><span><code class="code-block mt-2">fa fa-ban</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bandcamp"></i><span><code class="code-block mt-2">fa fa-bandcamp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bar-chart-o fa-bar-chart"></i><span><code class="code-block mt-2">fa fa-bar-chart-o fa-bar-chart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-barcode"></i><span><code class="code-block mt-2">fa fa-barcode</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bathtub fa-s15 fa-bath"></i><span><code class="code-block mt-2">fa fa-bathtub fa-s15 fa-bath</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-battery-0 fa-battery-empty"></i><span><code class="code-block mt-2">fa fa-battery-0 fa-battery-empty</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-battery-1 fa-battery-quarter"></i><span><code class="code-block mt-2">fa fa-battery-1 fa-battery-quarter</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-battery-2 fa-battery-half"></i><span><code class="code-block mt-2">fa fa-battery-2 fa-battery-half</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-battery-3 fa-battery-three-quarters"></i><span><code class="code-block mt-2">fa fa-battery-3 fa-battery-three-quarters</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-battery-4 fa-battery fa-battery-full"></i><span><code class="code-block mt-2">fa fa-battery-4 fa-battery fa-battery-full</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-beer"></i><span><code class="code-block mt-2">fa fa-beer</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-behance"></i><span><code class="code-block mt-2">fa fa-behance</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-behance-square"></i><span><code class="code-block mt-2">fa fa-behance-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bell"></i><span><code class="code-block mt-2">fa fa-bell</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bell-o"></i><span><code class="code-block mt-2">fa fa-bell-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bell-slash"></i><span><code class="code-block mt-2">fa fa-bell-slash</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bell-slash-o"></i><span><code class="code-block mt-2">fa fa-bell-slash-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bicycle"></i><span><code class="code-block mt-2">fa fa-bicycle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-binoculars"></i><span><code class="code-block mt-2">fa fa-binoculars</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-birthday-cake"></i><span><code class="code-block mt-2">fa fa-birthday-cake</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bitbucket"></i><span><code class="code-block mt-2">fa fa-bitbucket</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bitbucket-square"></i><span><code class="code-block mt-2">fa fa-bitbucket-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bitcoin fa-btc"></i><span><code class="code-block mt-2">fa fa-bitcoin fa-btc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-black-tie"></i><span><code class="code-block mt-2">fa fa-black-tie</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-blind"></i><span><code class="code-block mt-2">fa fa-blind</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bluetooth"></i><span><code class="code-block mt-2">fa fa-bluetooth</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bluetooth-b"></i><span><code class="code-block mt-2">fa fa-bluetooth-b</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bold"></i><span><code class="code-block mt-2">fa fa-bold</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bomb"></i><span><code class="code-block mt-2">fa fa-bomb</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-book"></i><span><code class="code-block mt-2">fa fa-book</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bookmark"></i><span><code class="code-block mt-2">fa fa-bookmark</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bookmark-o"></i><span><code class="code-block mt-2">fa fa-bookmark-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-braille"></i><span><code class="code-block mt-2">fa fa-braille</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-briefcase"></i><span><code class="code-block mt-2">fa fa-briefcase</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bug"></i><span><code class="code-block mt-2">fa fa-bug</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-building"></i><span><code class="code-block mt-2">fa fa-building</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-building-o"></i><span><code class="code-block mt-2">fa fa-building-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bullhorn"></i><span><code class="code-block mt-2">fa fa-bullhorn</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bullseye"></i><span><code class="code-block mt-2">fa fa-bullseye</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-bus"></i><span><code class="code-block mt-2">fa fa-bus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-buysellads"></i><span><code class="code-block mt-2">fa fa-buysellads</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cab fa-taxi"></i><span><code class="code-block mt-2">fa fa-cab fa-taxi</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calculator"></i><span><code class="code-block mt-2">fa fa-calculator</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar"></i><span><code class="code-block mt-2">fa fa-calendar</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar-check-o"></i><span><code class="code-block mt-2">fa fa-calendar-check-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar-minus-o"></i><span><code class="code-block mt-2">fa fa-calendar-minus-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar-o"></i><span><code class="code-block mt-2">fa fa-calendar-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar-plus-o"></i><span><code class="code-block mt-2">fa fa-calendar-plus-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-calendar-times-o"></i><span><code class="code-block mt-2">fa fa-calendar-times-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-camera"></i><span><code class="code-block mt-2">fa fa-camera</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-camera-retro"></i><span><code class="code-block mt-2">fa fa-camera-retro</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-caret-down"></i><span><code class="code-block mt-2">fa fa-caret-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-caret-left"></i><span><code class="code-block mt-2">fa fa-caret-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-caret-right"></i><span><code class="code-block mt-2">fa fa-caret-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-caret-up"></i><span><code class="code-block mt-2">fa fa-caret-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cart-arrow-down"></i><span><code class="code-block mt-2">fa fa-cart-arrow-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cart-plus"></i><span><code class="code-block mt-2">fa fa-cart-plus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc"></i><span><code class="code-block mt-2">fa fa-cc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-amex"></i><span><code class="code-block mt-2">fa fa-cc-amex</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-diners-club"></i><span><code class="code-block mt-2">fa fa-cc-diners-club</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-discover"></i><span><code class="code-block mt-2">fa fa-cc-discover</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-jcb"></i><span><code class="code-block mt-2">fa fa-cc-jcb</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-mastercard"></i><span><code class="code-block mt-2">fa fa-cc-mastercard</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-paypal"></i><span><code class="code-block mt-2">fa fa-cc-paypal</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-stripe"></i><span><code class="code-block mt-2">fa fa-cc-stripe</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cc-visa"></i><span><code class="code-block mt-2">fa fa-cc-visa</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-certificate"></i><span><code class="code-block mt-2">fa fa-certificate</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chain fa-link"></i><span><code class="code-block mt-2">fa fa-chain fa-link</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-check"></i><span><code class="code-block mt-2">fa fa-check</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-check-circle"></i><span><code class="code-block mt-2">fa fa-check-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-check-circle-o"></i><span><code class="code-block mt-2">fa fa-check-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-check-square"></i><span><code class="code-block mt-2">fa fa-check-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-check-square-o"></i><span><code class="code-block mt-2">fa fa-check-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-circle-down"></i><span><code class="code-block mt-2">fa fa-chevron-circle-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-circle-left"></i><span><code class="code-block mt-2">fa fa-chevron-circle-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-circle-right"></i><span><code class="code-block mt-2">fa fa-chevron-circle-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-circle-up"></i><span><code class="code-block mt-2">fa fa-chevron-circle-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-down"></i><span><code class="code-block mt-2">fa fa-chevron-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-left"></i><span><code class="code-block mt-2">fa fa-chevron-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-right"></i><span><code class="code-block mt-2">fa fa-chevron-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chevron-up"></i><span><code class="code-block mt-2">fa fa-chevron-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-child"></i><span><code class="code-block mt-2">fa fa-child</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-chrome"></i><span><code class="code-block mt-2">fa fa-chrome</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-circle"></i><span><code class="code-block mt-2">fa fa-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-circle-o"></i><span><code class="code-block mt-2">fa fa-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-circle-o-notch"></i><span><code class="code-block mt-2">fa fa-circle-o-notch</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-circle-thin"></i><span><code class="code-block mt-2">fa fa-circle-thin</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-clock-o"></i><span><code class="code-block mt-2">fa fa-clock-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-clone"></i><span><code class="code-block mt-2">fa fa-clone</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cloud"></i><span><code class="code-block mt-2">fa fa-cloud</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cloud-download"></i><span><code class="code-block mt-2">fa fa-cloud-download</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cloud-upload"></i><span><code class="code-block mt-2">fa fa-cloud-upload</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cny fa-rmb fa-yen fa-jpy"></i><span><code class="code-block mt-2">fa fa-cny fa-rmb fa-yen fa-jpy</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-code"></i><span><code class="code-block mt-2">fa fa-code</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-code-fork"></i><span><code class="code-block mt-2">fa fa-code-fork</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-codepen"></i><span><code class="code-block mt-2">fa fa-codepen</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-codiepie"></i><span><code class="code-block mt-2">fa fa-codiepie</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-coffee"></i><span><code class="code-block mt-2">fa fa-coffee</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-columns"></i><span><code class="code-block mt-2">fa fa-columns</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-comment"></i><span><code class="code-block mt-2">fa fa-comment</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-comment-o"></i><span><code class="code-block mt-2">fa fa-comment-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-commenting"></i><span><code class="code-block mt-2">fa fa-commenting</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-commenting-o"></i><span><code class="code-block mt-2">fa fa-commenting-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-comments"></i><span><code class="code-block mt-2">fa fa-comments</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-comments-o"></i><span><code class="code-block mt-2">fa fa-comments-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-compass"></i><span><code class="code-block mt-2">fa fa-compass</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-compress"></i><span><code class="code-block mt-2">fa fa-compress</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-connectdevelop"></i><span><code class="code-block mt-2">fa fa-connectdevelop</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-contao"></i><span><code class="code-block mt-2">fa fa-contao</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-copy fa-files-o"></i><span><code class="code-block mt-2">fa fa-copy fa-files-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-copyright"></i><span><code class="code-block mt-2">fa fa-copyright</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-creative-commons"></i><span><code class="code-block mt-2">fa fa-creative-commons</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-credit-card"></i><span><code class="code-block mt-2">fa fa-credit-card</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-credit-card-alt"></i><span><code class="code-block mt-2">fa fa-credit-card-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-crop"></i><span><code class="code-block mt-2">fa fa-crop</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-crosshairs"></i><span><code class="code-block mt-2">fa fa-crosshairs</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-css3"></i><span><code class="code-block mt-2">fa fa-css3</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cube"></i><span><code class="code-block mt-2">fa fa-cube</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cubes"></i><span><code class="code-block mt-2">fa fa-cubes</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cut fa-scissors"></i><span><code class="code-block mt-2">fa fa-cut fa-scissors</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-cutlery"></i><span><code class="code-block mt-2">fa fa-cutlery</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dashboard fa-tachometer"></i><span><code class="code-block mt-2">fa fa-dashboard fa-tachometer</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dashcube"></i><span><code class="code-block mt-2">fa fa-dashcube</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-database"></i><span><code class="code-block mt-2">fa fa-database</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-deafness fa-hard-of-hearing fa-deaf"></i><span><code class="code-block mt-2">fa fa-deafness fa-hard-of-hearing fa-deaf</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dedent fa-outdent"></i><span><code class="code-block mt-2">fa fa-dedent fa-outdent</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-delicious"></i><span><code class="code-block mt-2">fa fa-delicious</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-desktop"></i><span><code class="code-block mt-2">fa fa-desktop</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-deviantart"></i><span><code class="code-block mt-2">fa fa-deviantart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-diamond"></i><span><code class="code-block mt-2">fa fa-diamond</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-digg"></i><span><code class="code-block mt-2">fa fa-digg</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dollar fa-usd"></i><span><code class="code-block mt-2">fa fa-dollar fa-usd</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dot-circle-o"></i><span><code class="code-block mt-2">fa fa-dot-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-download"></i><span><code class="code-block mt-2">fa fa-download</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dribbble"></i><span><code class="code-block mt-2">fa fa-dribbble</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-drivers-license fa-id-card"></i><span><code class="code-block mt-2">fa fa-drivers-license fa-id-card</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-drivers-license-o fa-id-card-o"></i><span><code class="code-block mt-2">fa fa-drivers-license-o fa-id-card-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-dropbox"></i><span><code class="code-block mt-2">fa fa-dropbox</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-drupal"></i><span><code class="code-block mt-2">fa fa-drupal</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-edge"></i><span><code class="code-block mt-2">fa fa-edge</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-edit fa-pencil-square-o"></i><span><code class="code-block mt-2">fa fa-edit fa-pencil-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eercast"></i><span><code class="code-block mt-2">fa fa-eercast</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eject"></i><span><code class="code-block mt-2">fa fa-eject</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ellipsis-h"></i><span><code class="code-block mt-2">fa fa-ellipsis-h</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ellipsis-v"></i><span><code class="code-block mt-2">fa fa-ellipsis-v</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envelope"></i><span><code class="code-block mt-2">fa fa-envelope</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envelope-o"></i><span><code class="code-block mt-2">fa fa-envelope-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envelope-open"></i><span><code class="code-block mt-2">fa fa-envelope-open</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envelope-open-o"></i><span><code class="code-block mt-2">fa fa-envelope-open-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envelope-square"></i><span><code class="code-block mt-2">fa fa-envelope-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-envira"></i><span><code class="code-block mt-2">fa fa-envira</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eraser"></i><span><code class="code-block mt-2">fa fa-eraser</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-etsy"></i><span><code class="code-block mt-2">fa fa-etsy</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-euro fa-eur"></i><span><code class="code-block mt-2">fa fa-euro fa-eur</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-exchange"></i><span><code class="code-block mt-2">fa fa-exchange</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-exclamation"></i><span><code class="code-block mt-2">fa fa-exclamation</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-exclamation-circle"></i><span><code class="code-block mt-2">fa fa-exclamation-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-expand"></i><span><code class="code-block mt-2">fa fa-expand</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-expeditedssl"></i><span><code class="code-block mt-2">fa fa-expeditedssl</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-external-link"></i><span><code class="code-block mt-2">fa fa-external-link</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-external-link-square"></i><span><code class="code-block mt-2">fa fa-external-link-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eye"></i><span><code class="code-block mt-2">fa fa-eye</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eye-slash"></i><span><code class="code-block mt-2">fa fa-eye-slash</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-eyedropper"></i><span><code class="code-block mt-2">fa fa-eyedropper</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fa fa-font-awesome"></i><span><code class="code-block mt-2">fa fa-fa fa-font-awesome</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-facebook-f fa-facebook"></i><span><code class="code-block mt-2">fa fa-facebook-f fa-facebook</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-facebook-official"></i><span><code class="code-block mt-2">fa fa-facebook-official</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-facebook-square"></i><span><code class="code-block mt-2">fa fa-facebook-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fast-backward"></i><span><code class="code-block mt-2">fa fa-fast-backward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fast-forward"></i><span><code class="code-block mt-2">fa fa-fast-forward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fax"></i><span><code class="code-block mt-2">fa fa-fax</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-feed fa-rss"></i><span><code class="code-block mt-2">fa fa-feed fa-rss</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-female"></i><span><code class="code-block mt-2">fa fa-female</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fighter-jet"></i><span><code class="code-block mt-2">fa fa-fighter-jet</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file"></i><span><code class="code-block mt-2">fa fa-file</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-code-o"></i><span><code class="code-block mt-2">fa fa-file-code-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-excel-o"></i><span><code class="code-block mt-2">fa fa-file-excel-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-movie-o fa-file-video-o"></i><span><code class="code-block mt-2">fa fa-file-movie-o fa-file-video-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-o"></i><span><code class="code-block mt-2">fa fa-file-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-pdf-o"></i><span><code class="code-block mt-2">fa fa-file-pdf-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-photo-o fa-file-picture-o fa-file-image-o"></i><span><code class="code-block mt-2">fa fa-file-photo-o fa-file-picture-o fa-file-image-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-powerpoint-o"></i><span><code class="code-block mt-2">fa fa-file-powerpoint-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-sound-o fa-file-audio-o"></i><span><code class="code-block mt-2">fa fa-file-sound-o fa-file-audio-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-text"></i><span><code class="code-block mt-2">fa fa-file-text</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-text-o"></i><span><code class="code-block mt-2">fa fa-file-text-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-word-o"></i><span><code class="code-block mt-2">fa fa-file-word-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-file-zip-o fa-file-archive-o"></i><span><code class="code-block mt-2">fa fa-file-zip-o fa-file-archive-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-film"></i><span><code class="code-block mt-2">fa fa-film</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-filter"></i><span><code class="code-block mt-2">fa fa-filter</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fire"></i><span><code class="code-block mt-2">fa fa-fire</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fire-extinguisher"></i><span><code class="code-block mt-2">fa fa-fire-extinguisher</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-firefox"></i><span><code class="code-block mt-2">fa fa-firefox</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-first-order"></i><span><code class="code-block mt-2">fa fa-first-order</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flag"></i><span><code class="code-block mt-2">fa fa-flag</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flag-checkered"></i><span><code class="code-block mt-2">fa fa-flag-checkered</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flag-o"></i><span><code class="code-block mt-2">fa fa-flag-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flash fa-bolt"></i><span><code class="code-block mt-2">fa fa-flash fa-bolt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flask"></i><span><code class="code-block mt-2">fa fa-flask</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-flickr"></i><span><code class="code-block mt-2">fa fa-flickr</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-folder"></i><span><code class="code-block mt-2">fa fa-folder</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-folder-o"></i><span><code class="code-block mt-2">fa fa-folder-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-folder-open"></i><span><code class="code-block mt-2">fa fa-folder-open</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-folder-open-o"></i><span><code class="code-block mt-2">fa fa-folder-open-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-font"></i><span><code class="code-block mt-2">fa fa-font</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fonticons"></i><span><code class="code-block mt-2">fa fa-fonticons</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-fort-awesome"></i><span><code class="code-block mt-2">fa fa-fort-awesome</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-forumbee"></i><span><code class="code-block mt-2">fa fa-forumbee</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-forward"></i><span><code class="code-block mt-2">fa fa-forward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-foursquare"></i><span><code class="code-block mt-2">fa fa-foursquare</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-free-code-camp"></i><span><code class="code-block mt-2">fa fa-free-code-camp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-frown-o"></i><span><code class="code-block mt-2">fa fa-frown-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gamepad"></i><span><code class="code-block mt-2">fa fa-gamepad</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gbp"></i><span><code class="code-block mt-2">fa fa-gbp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ge fa-empire"></i><span><code class="code-block mt-2">fa fa-ge fa-empire</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gear fa-cog"></i><span><code class="code-block mt-2">fa fa-gear fa-cog</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gears fa-cogs"></i><span><code class="code-block mt-2">fa fa-gears fa-cogs</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-genderless"></i><span><code class="code-block mt-2">fa fa-genderless</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-get-pocket"></i><span><code class="code-block mt-2">fa fa-get-pocket</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gg"></i><span><code class="code-block mt-2">fa fa-gg</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gg-circle"></i><span><code class="code-block mt-2">fa fa-gg-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gift"></i><span><code class="code-block mt-2">fa fa-gift</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-git"></i><span><code class="code-block mt-2">fa fa-git</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-git-square"></i><span><code class="code-block mt-2">fa fa-git-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-github"></i><span><code class="code-block mt-2">fa fa-github</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-github-alt"></i><span><code class="code-block mt-2">fa fa-github-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-github-square"></i><span><code class="code-block mt-2">fa fa-github-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gitlab"></i><span><code class="code-block mt-2">fa fa-gitlab</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-gittip fa-gratipay"></i><span><code class="code-block mt-2">fa fa-gittip fa-gratipay</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-glass"></i><span><code class="code-block mt-2">fa fa-glass</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-glide"></i><span><code class="code-block mt-2">fa fa-glide</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-glide-g"></i><span><code class="code-block mt-2">fa fa-glide-g</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-globe"></i><span><code class="code-block mt-2">fa fa-globe</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-google"></i><span><code class="code-block mt-2">fa fa-google</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-google-plus"></i><span><code class="code-block mt-2">fa fa-google-plus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-google-plus-circle fa-google-plus-official"></i><span><code class="code-block mt-2">fa fa-google-plus-circle fa-google-plus-official</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-google-plus-square"></i><span><code class="code-block mt-2">fa fa-google-plus-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-google-wallet"></i><span><code class="code-block mt-2">fa fa-google-wallet</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-grav"></i><span><code class="code-block mt-2">fa fa-grav</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-group fa-users"></i><span><code class="code-block mt-2">fa fa-group fa-users</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-h-square"></i><span><code class="code-block mt-2">fa fa-h-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-grab-o fa-hand-rock-o"></i><span><code class="code-block mt-2">fa fa-hand-grab-o fa-hand-rock-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-lizard-o"></i><span><code class="code-block mt-2">fa fa-hand-lizard-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-o-down"></i><span><code class="code-block mt-2">fa fa-hand-o-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-o-left"></i><span><code class="code-block mt-2">fa fa-hand-o-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-o-right"></i><span><code class="code-block mt-2">fa fa-hand-o-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-o-up"></i><span><code class="code-block mt-2">fa fa-hand-o-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-peace-o"></i><span><code class="code-block mt-2">fa fa-hand-peace-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-pointer-o"></i><span><code class="code-block mt-2">fa fa-hand-pointer-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-scissors-o"></i><span><code class="code-block mt-2">fa fa-hand-scissors-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-spock-o"></i><span><code class="code-block mt-2">fa fa-hand-spock-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hand-stop-o fa-hand-paper-o"></i><span><code class="code-block mt-2">fa fa-hand-stop-o fa-hand-paper-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-handshake-o"></i><span><code class="code-block mt-2">fa fa-handshake-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hashtag"></i><span><code class="code-block mt-2">fa fa-hashtag</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hdd-o"></i><span><code class="code-block mt-2">fa fa-hdd-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-header"></i><span><code class="code-block mt-2">fa fa-header</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-headphones"></i><span><code class="code-block mt-2">fa fa-headphones</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-heart"></i><span><code class="code-block mt-2">fa fa-heart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-heart-o"></i><span><code class="code-block mt-2">fa fa-heart-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-heartbeat"></i><span><code class="code-block mt-2">fa fa-heartbeat</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-history"></i><span><code class="code-block mt-2">fa fa-history</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-home"></i><span><code class="code-block mt-2">fa fa-home</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hospital-o"></i><span><code class="code-block mt-2">fa fa-hospital-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hotel fa-bed"></i><span><code class="code-block mt-2">fa fa-hotel fa-bed</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hourglass"></i><span><code class="code-block mt-2">fa fa-hourglass</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hourglass-1 fa-hourglass-start"></i><span><code class="code-block mt-2">fa fa-hourglass-1 fa-hourglass-start</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hourglass-2 fa-hourglass-half"></i><span><code class="code-block mt-2">fa fa-hourglass-2 fa-hourglass-half</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hourglass-3 fa-hourglass-end"></i><span><code class="code-block mt-2">fa fa-hourglass-3 fa-hourglass-end</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-hourglass-o"></i><span><code class="code-block mt-2">fa fa-hourglass-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-houzz"></i><span><code class="code-block mt-2">fa fa-houzz</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-html5"></i><span><code class="code-block mt-2">fa fa-html5</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-i-cursor"></i><span><code class="code-block mt-2">fa fa-i-cursor</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-id-badge"></i><span><code class="code-block mt-2">fa fa-id-badge</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-imdb"></i><span><code class="code-block mt-2">fa fa-imdb</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-inbox"></i><span><code class="code-block mt-2">fa fa-inbox</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-indent"></i><span><code class="code-block mt-2">fa fa-indent</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-industry"></i><span><code class="code-block mt-2">fa fa-industry</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-info"></i><span><code class="code-block mt-2">fa fa-info</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-info-circle"></i><span><code class="code-block mt-2">fa fa-info-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-instagram"></i><span><code class="code-block mt-2">fa fa-instagram</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-institution fa-bank fa-university"></i><span><code class="code-block mt-2">fa fa-institution fa-bank fa-university</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-internet-explorer"></i><span><code class="code-block mt-2">fa fa-internet-explorer</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-intersex fa-transgender"></i><span><code class="code-block mt-2">fa fa-intersex fa-transgender</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ioxhost"></i><span><code class="code-block mt-2">fa fa-ioxhost</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-italic"></i><span><code class="code-block mt-2">fa fa-italic</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-joomla"></i><span><code class="code-block mt-2">fa fa-joomla</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-jsfiddle"></i><span><code class="code-block mt-2">fa fa-jsfiddle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-key"></i><span><code class="code-block mt-2">fa fa-key</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-keyboard-o"></i><span><code class="code-block mt-2">fa fa-keyboard-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-language"></i><span><code class="code-block mt-2">fa fa-language</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-laptop"></i><span><code class="code-block mt-2">fa fa-laptop</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-lastfm"></i><span><code class="code-block mt-2">fa fa-lastfm</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-lastfm-square"></i><span><code class="code-block mt-2">fa fa-lastfm-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-leaf"></i><span><code class="code-block mt-2">fa fa-leaf</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-leanpub"></i><span><code class="code-block mt-2">fa fa-leanpub</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-legal fa-gavel"></i><span><code class="code-block mt-2">fa fa-legal fa-gavel</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-lemon-o"></i><span><code class="code-block mt-2">fa fa-lemon-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-level-down"></i><span><code class="code-block mt-2">fa fa-level-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-level-up"></i><span><code class="code-block mt-2">fa fa-level-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-life-bouy fa-life-buoy fa-life-saver fa-support fa-life-ring"></i><span><code class="code-block mt-2">fa fa-life-bouy fa-life-buoy fa-life-saver fa-support fa-life-ring</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-lightbulb-o"></i><span><code class="code-block mt-2">fa fa-lightbulb-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-line-chart"></i><span><code class="code-block mt-2">fa fa-line-chart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-linkedin"></i><span><code class="code-block mt-2">fa fa-linkedin</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-linkedin-square"></i><span><code class="code-block mt-2">fa fa-linkedin-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-linode"></i><span><code class="code-block mt-2">fa fa-linode</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-linux"></i><span><code class="code-block mt-2">fa fa-linux</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-list"></i><span><code class="code-block mt-2">fa fa-list</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-list-alt"></i><span><code class="code-block mt-2">fa fa-list-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-list-ol"></i><span><code class="code-block mt-2">fa fa-list-ol</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-list-ul"></i><span><code class="code-block mt-2">fa fa-list-ul</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-location-arrow"></i><span><code class="code-block mt-2">fa fa-location-arrow</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-lock"></i><span><code class="code-block mt-2">fa fa-lock</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-long-arrow-down"></i><span><code class="code-block mt-2">fa fa-long-arrow-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-long-arrow-left"></i><span><code class="code-block mt-2">fa fa-long-arrow-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-long-arrow-right"></i><span><code class="code-block mt-2">fa fa-long-arrow-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-long-arrow-up"></i><span><code class="code-block mt-2">fa fa-long-arrow-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-low-vision"></i><span><code class="code-block mt-2">fa fa-low-vision</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-magic"></i><span><code class="code-block mt-2">fa fa-magic</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-magnet"></i><span><code class="code-block mt-2">fa fa-magnet</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mail-forward fa-share"></i><span><code class="code-block mt-2">fa fa-mail-forward fa-share</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mail-reply fa-reply"></i><span><code class="code-block mt-2">fa fa-mail-reply fa-reply</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mail-reply-all fa-reply-all"></i><span><code class="code-block mt-2">fa fa-mail-reply-all fa-reply-all</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-male"></i><span><code class="code-block mt-2">fa fa-male</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-map"></i><span><code class="code-block mt-2">fa fa-map</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-map-marker"></i><span><code class="code-block mt-2">fa fa-map-marker</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-map-o"></i><span><code class="code-block mt-2">fa fa-map-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-map-pin"></i><span><code class="code-block mt-2">fa fa-map-pin</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-map-signs"></i><span><code class="code-block mt-2">fa fa-map-signs</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mars"></i><span><code class="code-block mt-2">fa fa-mars</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mars-double"></i><span><code class="code-block mt-2">fa fa-mars-double</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mars-stroke"></i><span><code class="code-block mt-2">fa fa-mars-stroke</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mars-stroke-h"></i><span><code class="code-block mt-2">fa fa-mars-stroke-h</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mars-stroke-v"></i><span><code class="code-block mt-2">fa fa-mars-stroke-v</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-maxcdn"></i><span><code class="code-block mt-2">fa fa-maxcdn</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-meanpath"></i><span><code class="code-block mt-2">fa fa-meanpath</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-medium"></i><span><code class="code-block mt-2">fa fa-medium</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-medkit"></i><span><code class="code-block mt-2">fa fa-medkit</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-meetup"></i><span><code class="code-block mt-2">fa fa-meetup</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-meh-o"></i><span><code class="code-block mt-2">fa fa-meh-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mercury"></i><span><code class="code-block mt-2">fa fa-mercury</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-microchip"></i><span><code class="code-block mt-2">fa fa-microchip</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-microphone"></i><span><code class="code-block mt-2">fa fa-microphone</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-microphone-slash"></i><span><code class="code-block mt-2">fa fa-microphone-slash</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-minus"></i><span><code class="code-block mt-2">fa fa-minus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-minus-circle"></i><span><code class="code-block mt-2">fa fa-minus-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-minus-square"></i><span><code class="code-block mt-2">fa fa-minus-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-minus-square-o"></i><span><code class="code-block mt-2">fa fa-minus-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mixcloud"></i><span><code class="code-block mt-2">fa fa-mixcloud</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mobile-phone fa-mobile"></i><span><code class="code-block mt-2">fa fa-mobile-phone fa-mobile</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-modx"></i><span><code class="code-block mt-2">fa fa-modx</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-money"></i><span><code class="code-block mt-2">fa fa-money</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-moon-o"></i><span><code class="code-block mt-2">fa fa-moon-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mortar-board fa-graduation-cap"></i><span><code class="code-block mt-2">fa fa-mortar-board fa-graduation-cap</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-motorcycle"></i><span><code class="code-block mt-2">fa fa-motorcycle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-mouse-pointer"></i><span><code class="code-block mt-2">fa fa-mouse-pointer</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-music"></i><span><code class="code-block mt-2">fa fa-music</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-navicon fa-reorder fa-bars"></i><span><code class="code-block mt-2">fa fa-navicon fa-reorder fa-bars</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-neuter"></i><span><code class="code-block mt-2">fa fa-neuter</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-newspaper-o"></i><span><code class="code-block mt-2">fa fa-newspaper-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-object-group"></i><span><code class="code-block mt-2">fa fa-object-group</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-object-ungroup"></i><span><code class="code-block mt-2">fa fa-object-ungroup</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-odnoklassniki"></i><span><code class="code-block mt-2">fa fa-odnoklassniki</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-odnoklassniki-square"></i><span><code class="code-block mt-2">fa fa-odnoklassniki-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-opencart"></i><span><code class="code-block mt-2">fa fa-opencart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-openid"></i><span><code class="code-block mt-2">fa fa-openid</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-opera"></i><span><code class="code-block mt-2">fa fa-opera</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-optin-monster"></i><span><code class="code-block mt-2">fa fa-optin-monster</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pagelines"></i><span><code class="code-block mt-2">fa fa-pagelines</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paint-brush"></i><span><code class="code-block mt-2">fa fa-paint-brush</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paperclip"></i><span><code class="code-block mt-2">fa fa-paperclip</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paragraph"></i><span><code class="code-block mt-2">fa fa-paragraph</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paste fa-clipboard"></i><span><code class="code-block mt-2">fa fa-paste fa-clipboard</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pause"></i><span><code class="code-block mt-2">fa fa-pause</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pause-circle"></i><span><code class="code-block mt-2">fa fa-pause-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pause-circle-o"></i><span><code class="code-block mt-2">fa fa-pause-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paw"></i><span><code class="code-block mt-2">fa fa-paw</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-paypal"></i><span><code class="code-block mt-2">fa fa-paypal</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pencil"></i><span><code class="code-block mt-2">fa fa-pencil</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pencil-square"></i><span><code class="code-block mt-2">fa fa-pencil-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-percent"></i><span><code class="code-block mt-2">fa fa-percent</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-phone"></i><span><code class="code-block mt-2">fa fa-phone</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-phone-square"></i><span><code class="code-block mt-2">fa fa-phone-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-photo fa-image fa-picture-o"></i><span><code class="code-block mt-2">fa fa-photo fa-image fa-picture-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pie-chart"></i><span><code class="code-block mt-2">fa fa-pie-chart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pied-piper"></i><span><code class="code-block mt-2">fa fa-pied-piper</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pied-piper-alt"></i><span><code class="code-block mt-2">fa fa-pied-piper-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pied-piper-pp"></i><span><code class="code-block mt-2">fa fa-pied-piper-pp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pinterest"></i><span><code class="code-block mt-2">fa fa-pinterest</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pinterest-p"></i><span><code class="code-block mt-2">fa fa-pinterest-p</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-pinterest-square"></i><span><code class="code-block mt-2">fa fa-pinterest-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plane"></i><span><code class="code-block mt-2">fa fa-plane</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-play"></i><span><code class="code-block mt-2">fa fa-play</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-play-circle"></i><span><code class="code-block mt-2">fa fa-play-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-play-circle-o"></i><span><code class="code-block mt-2">fa fa-play-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plug"></i><span><code class="code-block mt-2">fa fa-plug</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plus"></i><span><code class="code-block mt-2">fa fa-plus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plus-circle"></i><span><code class="code-block mt-2">fa fa-plus-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plus-square"></i><span><code class="code-block mt-2">fa fa-plus-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-plus-square-o"></i><span><code class="code-block mt-2">fa fa-plus-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-podcast"></i><span><code class="code-block mt-2">fa fa-podcast</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-power-off"></i><span><code class="code-block mt-2">fa fa-power-off</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-print"></i><span><code class="code-block mt-2">fa fa-print</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-product-hunt"></i><span><code class="code-block mt-2">fa fa-product-hunt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-puzzle-piece"></i><span><code class="code-block mt-2">fa fa-puzzle-piece</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-qq"></i><span><code class="code-block mt-2">fa fa-qq</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-qrcode"></i><span><code class="code-block mt-2">fa fa-qrcode</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-question"></i><span><code class="code-block mt-2">fa fa-question</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-question-circle"></i><span><code class="code-block mt-2">fa fa-question-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-question-circle-o"></i><span><code class="code-block mt-2">fa fa-question-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-quora"></i><span><code class="code-block mt-2">fa fa-quora</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-quote-left"></i><span><code class="code-block mt-2">fa fa-quote-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-quote-right"></i><span><code class="code-block mt-2">fa fa-quote-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ra fa-resistance fa-rebel"></i><span><code class="code-block mt-2">fa fa-ra fa-resistance fa-rebel</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-random"></i><span><code class="code-block mt-2">fa fa-random</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ravelry"></i><span><code class="code-block mt-2">fa fa-ravelry</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-recycle"></i><span><code class="code-block mt-2">fa fa-recycle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-reddit"></i><span><code class="code-block mt-2">fa fa-reddit</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-reddit-alien"></i><span><code class="code-block mt-2">fa fa-reddit-alien</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-reddit-square"></i><span><code class="code-block mt-2">fa fa-reddit-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-refresh"></i><span><code class="code-block mt-2">fa fa-refresh</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-registered"></i><span><code class="code-block mt-2">fa fa-registered</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-remove fa-close fa-times"></i><span><code class="code-block mt-2">fa fa-remove fa-close fa-times</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-renren"></i><span><code class="code-block mt-2">fa fa-renren</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-retweet"></i><span><code class="code-block mt-2">fa fa-retweet</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-road"></i><span><code class="code-block mt-2">fa fa-road</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-rocket"></i><span><code class="code-block mt-2">fa fa-rocket</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-rotate-left fa-undo"></i><span><code class="code-block mt-2">fa fa-rotate-left fa-undo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-rotate-right fa-repeat"></i><span><code class="code-block mt-2">fa fa-rotate-right fa-repeat</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-rss-square"></i><span><code class="code-block mt-2">fa fa-rss-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ruble fa-rouble fa-rub"></i><span><code class="code-block mt-2">fa fa-ruble fa-rouble fa-rub</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-rupee fa-inr"></i><span><code class="code-block mt-2">fa fa-rupee fa-inr</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-safari"></i><span><code class="code-block mt-2">fa fa-sa.fari</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-save fa-floppy-o"></i><span><code class="code-block mt-2">fa fa-save fa-floppy-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-scribd"></i><span><code class="code-block mt-2">fa fa-scribd</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-search"></i><span><code class="code-block mt-2">fa fa-search</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-search-minus"></i><span><code class="code-block mt-2">fa fa-search-minus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-search-plus"></i><span><code class="code-block mt-2">fa fa-search-plus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sellsy"></i><span><code class="code-block mt-2">fa fa-sellsy</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-send fa-paper-plane"></i><span><code class="code-block mt-2">fa fa-send fa-paper-plane</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-send-o fa-paper-plane-o"></i><span><code class="code-block mt-2">fa fa-send-o fa-paper-plane-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-server"></i><span><code class="code-block mt-2">fa fa-server</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-share-alt"></i><span><code class="code-block mt-2">fa fa-share-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-share-alt-square"></i><span><code class="code-block mt-2">fa fa-share-alt-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-share-square"></i><span><code class="code-block mt-2">fa fa-share-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-share-square-o"></i><span><code class="code-block mt-2">fa fa-share-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shekel fa-sheqel fa-ils"></i><span><code class="code-block mt-2">fa fa-shekel fa-sheqel fa-ils</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shield"></i><span><code class="code-block mt-2">fa fa-shield</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ship"></i><span><code class="code-block mt-2">fa fa-ship</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shirtsinbulk"></i><span><code class="code-block mt-2">fa fa-shirtsinbulk</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shopping-bag"></i><span><code class="code-block mt-2">fa fa-shopping-bag</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shopping-basket"></i><span><code class="code-block mt-2">fa fa-shopping-basket</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shopping-cart"></i><span><code class="code-block mt-2">fa fa-shopping-cart</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-shower"></i><span><code class="code-block mt-2">fa fa-shower</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sign-in"></i><span><code class="code-block mt-2">fa fa-sign-in</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sign-out"></i><span><code class="code-block mt-2">fa fa-sign-out</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-signal"></i><span><code class="code-block mt-2">fa fa-signal</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-signing fa-sign-language"></i><span><code class="code-block mt-2">fa fa-signing fa-sign-language</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-simplybuilt"></i><span><code class="code-block mt-2">fa fa-simplybuilt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sitemap"></i><span><code class="code-block mt-2">fa fa-sitemap</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-skyatlas"></i><span><code class="code-block mt-2">fa fa-skyatlas</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-skype"></i><span><code class="code-block mt-2">fa fa-skype</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-slack"></i><span><code class="code-block mt-2">fa fa-slack</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sliders"></i><span><code class="code-block mt-2">fa fa-sliders</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-slideshare"></i><span><code class="code-block mt-2">fa fa-slideshare</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-smile-o"></i><span><code class="code-block mt-2">fa fa-smile-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-snapchat"></i><span><code class="code-block mt-2">fa fa-snapchat</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-snapchat-ghost"></i><span><code class="code-block mt-2">fa fa-snapchat-ghost</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-snapchat-square"></i><span><code class="code-block mt-2">fa fa-snapchat-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-snowflake-o"></i><span><code class="code-block mt-2">fa fa-snowflake-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-soccer-ball-o fa-futbol-o"></i><span><code class="code-block mt-2">fa fa-soccer-ball-o fa-futbol-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-alpha-asc"></i><span><code class="code-block mt-2">fa fa-sort-alpha-asc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-alpha-desc"></i><span><code class="code-block mt-2">fa fa-sort-alpha-desc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-amount-asc"></i><span><code class="code-block mt-2">fa fa-sort-amount-asc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-amount-desc"></i><span><code class="code-block mt-2">fa fa-sort-amount-desc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-down fa-sort-desc"></i><span><code class="code-block mt-2">fa fa-sort-down fa-sort-desc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-numeric-asc"></i><span><code class="code-block mt-2">fa fa-sort-numeric-asc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-numeric-desc"></i><span><code class="code-block mt-2">fa fa-sort-numeric-desc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sort-up fa-sort-asc"></i><span><code class="code-block mt-2">fa fa-sort-up fa-sort-asc</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-soundcloud"></i><span><code class="code-block mt-2">fa fa-soundcloud</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-space-shuttle"></i><span><code class="code-block mt-2">fa fa-space-shuttle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-spinner"></i><span><code class="code-block mt-2">fa fa-spinner</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-spoon"></i><span><code class="code-block mt-2">fa fa-spoon</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-spotify"></i><span><code class="code-block mt-2">fa fa-spotify</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-square"></i><span><code class="code-block mt-2">fa fa-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-square-o"></i><span><code class="code-block mt-2">fa fa-square-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stack-exchange"></i><span><code class="code-block mt-2">fa fa-stack-exchange</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stack-overflow"></i><span><code class="code-block mt-2">fa fa-stack-overflow</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-star"></i><span><code class="code-block mt-2">fa fa-star</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-star-half"></i><span><code class="code-block mt-2">fa fa-star-half</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-star-half-empty fa-star-half-full fa-star-half-o"></i><span><code class="code-block mt-2">fa fa-star-half-empty fa-star-half-full fa-star-half-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-star-o"></i><span><code class="code-block mt-2">fa fa-star-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-steam"></i><span><code class="code-block mt-2">fa fa-steam</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-steam-square"></i><span><code class="code-block mt-2">fa fa-steam-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-step-backward"></i><span><code class="code-block mt-2">fa fa-step-backward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-step-forward"></i><span><code class="code-block mt-2">fa fa-step-forward</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stethoscope"></i><span><code class="code-block mt-2">fa fa-stethoscope</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sticky-note"></i><span><code class="code-block mt-2">fa fa-sticky-note</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sticky-note-o"></i><span><code class="code-block mt-2">fa fa-sticky-note-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stop"></i><span><code class="code-block mt-2">fa fa-stop</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stop-circle"></i><span><code class="code-block mt-2">fa fa-stop-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stop-circle-o"></i><span><code class="code-block mt-2">fa fa-stop-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-street-view"></i><span><code class="code-block mt-2">fa fa-street-view</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-strikethrough"></i><span><code class="code-block mt-2">fa fa-strikethrough</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stumbleupon"></i><span><code class="code-block mt-2">fa fa-stumbleupon</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-stumbleupon-circle"></i><span><code class="code-block mt-2">fa fa-stumbleupon-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-subscript"></i><span><code class="code-block mt-2">fa fa-subscript</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-subway"></i><span><code class="code-block mt-2">fa fa-subway</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-suitcase"></i><span><code class="code-block mt-2">fa fa-suitcase</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-sun-o"></i><span><code class="code-block mt-2">fa fa-sun-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-superpowers"></i><span><code class="code-block mt-2">fa fa-superpowers</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-superscript"></i><span><code class="code-block mt-2">fa fa-superscript</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-table"></i><span><code class="code-block mt-2">fa fa-table</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tablet"></i><span><code class="code-block mt-2">fa fa-tablet</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tag"></i><span><code class="code-block mt-2">fa fa-tag</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tags"></i><span><code class="code-block mt-2">fa fa-tags</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tasks"></i><span><code class="code-block mt-2">fa fa-tasks</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-telegram"></i><span><code class="code-block mt-2">fa fa-telegram</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tencent-weibo"></i><span><code class="code-block mt-2">fa fa-tencent-weibo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-terminal"></i><span><code class="code-block mt-2">fa fa-terminal</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-text-height"></i><span><code class="code-block mt-2">fa fa-text-height</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-text-width"></i><span><code class="code-block mt-2">fa fa-text-width</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-th"></i><span><code class="code-block mt-2">fa fa-th</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-th-large"></i><span><code class="code-block mt-2">fa fa-th-large</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-th-list"></i><span><code class="code-block mt-2">fa fa-th-list</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-themeisle"></i><span><code class="code-block mt-2">fa fa-themeisle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thermometer-0 fa-thermometer-empty"></i><span><code class="code-block mt-2">fa fa-thermometer-0 fa-thermometer-empty</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thermometer-1 fa-thermometer-quarter"></i><span><code class="code-block mt-2">fa fa-thermometer-1 fa-thermometer-quarter</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thermometer-2 fa-thermometer-half"></i><span><code class="code-block mt-2">fa fa-thermometer-2 fa-thermometer-half</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thermometer-3 fa-thermometer-three-quarters"></i><span><code class="code-block mt-2">fa fa-thermometer-3 fa-thermometer-three-quarters</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thermometer-4 fa-thermometer fa-thermometer-full"></i><span><code class="code-block mt-2">fa fa-thermometer-4 fa-thermometer fa-thermometer-full</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thumb-tack"></i><span><code class="code-block mt-2">fa fa-thumb-tack</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thumbs-down"></i><span><code class="code-block mt-2">fa fa-thumbs-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thumbs-o-down"></i><span><code class="code-block mt-2">fa fa-thumbs-o-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thumbs-o-up"></i><span><code class="code-block mt-2">fa fa-thumbs-o-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-thumbs-up"></i><span><code class="code-block mt-2">fa fa-thumbs-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-ticket"></i><span><code class="code-block mt-2">fa fa-ticket</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-times-circle"></i><span><code class="code-block mt-2">fa fa-times-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-times-circle-o"></i><span><code class="code-block mt-2">fa fa-times-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-times-rectangle fa-window-close"></i><span><code class="code-block mt-2">fa fa-times-rectangle fa-window-close</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-times-rectangle-o fa-window-close-o"></i><span><code class="code-block mt-2">fa fa-times-rectangle-o fa-window-close-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tint"></i><span><code class="code-block mt-2">fa fa-tint</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-down fa-caret-square-o-down"></i><span><code class="code-block mt-2">fa fa-toggle-down fa-caret-square-o-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-left fa-caret-square-o-left"></i><span><code class="code-block mt-2">fa fa-toggle-left fa-caret-square-o-left</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-off"></i><span><code class="code-block mt-2">fa fa-toggle-off</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-on"></i><span><code class="code-block mt-2">fa fa-toggle-on</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-right fa-caret-square-o-right"></i><span><code class="code-block mt-2">fa fa-toggle-right fa-caret-square-o-right</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-toggle-up fa-caret-square-o-up"></i><span><code class="code-block mt-2">fa fa-toggle-up fa-caret-square-o-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-trademark"></i><span><code class="code-block mt-2">fa fa-trademark</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-train"></i><span><code class="code-block mt-2">fa fa-train</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-transgender-alt"></i><span><code class="code-block mt-2">fa fa-transgender-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-trash"></i><span><code class="code-block mt-2">fa fa-trash</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-trash-o"></i><span><code class="code-block mt-2">fa fa-trash-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tree"></i><span><code class="code-block mt-2">fa fa-tree</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-trello"></i><span><code class="code-block mt-2">fa fa-trello</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tripadvisor"></i><span><code class="code-block mt-2">fa fa-tripadvisor</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-trophy"></i><span><code class="code-block mt-2">fa fa-trophy</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-truck"></i><span><code class="code-block mt-2">fa fa-truck</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tty"></i><span><code class="code-block mt-2">fa fa-tty</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tumblr"></i><span><code class="code-block mt-2">fa fa-tumblr</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tumblr-square"></i><span><code class="code-block mt-2">fa fa-tumblr-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-turkish-lira fa-try"></i><span><code class="code-block mt-2">fa fa-turkish-lira fa-try</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-tv fa-television"></i><span><code class="code-block mt-2">fa fa-tv fa-television</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-twitch"></i><span><code class="code-block mt-2">fa fa-twitch</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-twitter"></i><span><code class="code-block mt-2">fa fa-twitter</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-twitter-square"></i><span><code class="code-block mt-2">fa fa-twitter-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-umbrella"></i><span><code class="code-block mt-2">fa fa-umbrella</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-underline"></i><span><code class="code-block mt-2">fa fa-underline</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-universal-access"></i><span><code class="code-block mt-2">fa fa-universal-access</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-unlink fa-chain-broken"></i><span><code class="code-block mt-2">fa fa-unlink fa-chain-broken</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-unlock"></i><span><code class="code-block mt-2">fa fa-unlock</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-unlock-alt"></i><span><code class="code-block mt-2">fa fa-unlock-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-unsorted fa-sort"></i><span><code class="code-block mt-2">fa fa-unsorted fa-sort</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-upload"></i><span><code class="code-block mt-2">fa fa-upload</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-usb"></i><span><code class="code-block mt-2">fa fa-usb</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user"></i><span><code class="code-block mt-2">fa fa-user</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-circle"></i><span><code class="code-block mt-2">fa fa-user-circle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-circle-o"></i><span><code class="code-block mt-2">fa fa-user-circle-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-md"></i><span><code class="code-block mt-2">fa fa-user-md</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-o"></i><span><code class="code-block mt-2">fa fa-user-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-plus"></i><span><code class="code-block mt-2">fa fa-user-plus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-secret"></i><span><code class="code-block mt-2">fa fa-user-secret</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-user-times"></i><span><code class="code-block mt-2">fa fa-user-times</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vcard fa-address-card"></i><span><code class="code-block mt-2">fa fa-vcard fa-address-card</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vcard-o fa-address-card-o"></i><span><code class="code-block mt-2">fa fa-vcard-o fa-address-card-o</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-venus"></i><span><code class="code-block mt-2">fa fa-venus</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-venus-double"></i><span><code class="code-block mt-2">fa fa-venus-double</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-venus-mars"></i><span><code class="code-block mt-2">fa fa-venus-mars</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-viacoin"></i><span><code class="code-block mt-2">fa fa-viacoin</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-viadeo"></i><span><code class="code-block mt-2">fa fa-viadeo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-viadeo-square"></i><span><code class="code-block mt-2">fa fa-viadeo-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-video-camera"></i><span><code class="code-block mt-2">fa fa-video-camera</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vimeo"></i><span><code class="code-block mt-2">fa fa-vimeo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vimeo-square"></i><span><code class="code-block mt-2">fa fa-vimeo-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vine"></i><span><code class="code-block mt-2">fa fa-vine</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-vk"></i><span><code class="code-block mt-2">fa fa-vk</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-volume-control-phone"></i><span><code class="code-block mt-2">fa fa-volume-control-phone</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-volume-down"></i><span><code class="code-block mt-2">fa fa-volume-down</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-volume-off"></i><span><code class="code-block mt-2">fa fa-volume-off</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-volume-up"></i><span><code class="code-block mt-2">fa fa-volume-up</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-warning fa-exclamation-triangle"></i><span><code class="code-block mt-2">fa fa-warning fa-exclamation-triangle</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wechat fa-weixin"></i><span><code class="code-block mt-2">fa fa-wechat fa-weixin</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-weibo"></i><span><code class="code-block mt-2">fa fa-weibo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-whatsapp"></i><span><code class="code-block mt-2">fa fa-whatsapp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wheelchair"></i><span><code class="code-block mt-2">fa fa-wheelchair</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wheelchair-alt"></i><span><code class="code-block mt-2">fa fa-wheelchair-alt</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wifi"></i><span><code class="code-block mt-2">fa fa-wifi</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wikipedia-w"></i><span><code class="code-block mt-2">fa fa-wikipedia-w</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-window-maximize"></i><span><code class="code-block mt-2">fa fa-window-maximize</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-window-minimize"></i><span><code class="code-block mt-2">fa fa-window-minimize</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-window-restore"></i><span><code class="code-block mt-2">fa fa-window-restore</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-windows"></i><span><code class="code-block mt-2">fa fa-windows</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-won fa-krw"></i><span><code class="code-block mt-2">fa fa-won fa-krw</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wordpress"></i><span><code class="code-block mt-2">fa fa-wordpress</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wpbeginner"></i><span><code class="code-block mt-2">fa fa-wpbeginner</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wpexplorer"></i><span><code class="code-block mt-2">fa fa-wpexplorer</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wpforms"></i><span><code class="code-block mt-2">fa fa-wpforms</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-wrench"></i><span><code class="code-block mt-2">fa fa-wrench</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-xing"></i><span><code class="code-block mt-2">fa fa-xing</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-xing-square"></i><span><code class="code-block mt-2">fa fa-xing-square</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-y-combinator-square fa-yc-square fa-hacker-news"></i><span><code class="code-block mt-2">fa fa-y-combinator-square fa-yc-square fa-hacker-news</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-yahoo"></i><span><code class="code-block mt-2">fa fa-yahoo</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-yc fa-y-combinator"></i><span><code class="code-block mt-2">fa fa-yc fa-y-combinator</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-yelp"></i><span><code class="code-block mt-2">fa fa-yelp</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-yoast"></i><span><code class="code-block mt-2">fa fa-yoast</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-youtube"></i><span><code class="code-block mt-2">fa fa-youtube</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-youtube-play"></i><span><code class="code-block mt-2">fa fa-youtube-play</code></span></div>
          <div class="w-1/6 text-center p-1"><i style="font-size: 36px" class="my-2 fa fa-youtube-square"></i><span><code class="code-block mt-2">fa fa-youtube-square</code></span></div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('templates')
<textarea id="code-copy"></textarea>
@stop

@section('scripts')
  <script type="text/javascript">
    $(document).on('click', '.copy-code', function() {
      var copy = $(this).parent('.copy-container').find('.copy-block');
      var display = $(this).parent('.copy-container').find('.display-block');
      copy.select();
      document.execCommand('copy');
      display.addClass('copied');
      setTimeout(function() {
        display.removeClass('copied');
        copy.blur();
      }, 100)
    });

    $(document).on('click', '.code-block', function() {
      var copy = $(this);
      $('#code-copy').val(copy.html()).select();
      document.execCommand('copy');
      copy.addClass('copied');
      setTimeout(function() {
        copy.removeClass('copied');
        $('#code-copy').val('').blur();
      }, 100)
    });
  </script>
@stop
