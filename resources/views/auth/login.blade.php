{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


<x-guest-layout>
    <!DOCTYPE html><html lang="en" class="v2fLMH8w3xgUEQcl63H9"><head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get started with a premium admin dashboard layout built with Tailwind CSS and Flowbite featuring 21 example pages including charts, kanban board, mailing system, and more.">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.88.1">

    <title>Tailwind CSS Sign in/Login Page - Flowbite</title>

    <link rel="canonical" href="https://flowbite.com/application-ui/demo/authentication/sign-in/">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://flowbite.com/application-ui/demo/app.css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://flowbite.com/application-ui/demo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://flowbite.com/application-ui/demo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://flowbite.com/application-ui/demo/favicon-16x16.png">
    <link rel="icon" type="image/png" href="https://flowbite.com/application-ui/demo/favicon.ico">
    <link rel="manifest" href="https://flowbite.com/application-ui/demo/site.webmanifest">
    <link rel="mask-icon" href="https://flowbite.com/application-ui/demo/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Tailwind CSS Sign in/Login Page - Flowbite">
    <meta name="twitter:description" content="Get started with a premium admin dashboard layout built with Tailwind CSS and Flowbite featuring 21 example pages including charts, kanban board, mailing system, and more.">
    <meta name="twitter:image" content="https://flowbite.com/application-ui/demo/images/og-image.jpg">

    <!-- Facebook -->
    <meta property="og:url" content="https://flowbite.com/application-ui/demo/authentication/sign-in/">
    <meta property="og:title" content="Tailwind CSS Sign in/Login Page - Flowbite">
    <meta property="og:description" content="Get started with a premium admin dashboard layout built with Tailwind CSS and Flowbite featuring 21 example pages including charts, kanban board, mailing system, and more.">
    <meta property="og:type" content="article">
    <meta property="og:image" content="https://flowbite.com/application-ui/demo/images/og-image.jpg">
    <meta property="og:image:type" content="image/png">





    <!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-9"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-141734189-9');
    </script> -->


    <script>

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          //  document.documentElement.classList.add('v2fLMH8w3xgUEQcl63H9');

          document.documentElement.classList.remove('v2fLMH8w3xgUEQcl63H9')
        } else {
            document.documentElement.classList.remove('v2fLMH8w3xgUEQcl63H9')
        }
    </script>
      </head>
      <body class="jtAJHOc7mn7b4IKRO59D _1jTZ8KXRZul60S6czNi">
        <main class="jtAJHOc7mn7b4IKRO59D h8KYXnua2NT4kTVzieom  " >

      <div class="flex flex-col  items-center justify-center px-6  mx-auto md:h-screen pt:mt-0 dark:bg-gray-900     h-screen my-auto overflow-hidden">

        <!-- Card -->
        <div class=" my-auto Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU t6gkcSf0Bt4MLItXvDJ_ _Ybd3WwuTVljUT4vEaM3 mveJTCIb2WII7J4sY22F mngKhi_Rv06PF57lblDI _YtPVN_LlqV6t4rglMAI fMgHUheWh_tlS12QmZV7 P9GeNSEWTjwr5S8oYXzg 2xl:max:max-w-screen-lg _74Ro6wvR4pVSwhxRa2l _1jTZ8KXRZul60S6czNi overflow-hidden">
            <div class="  flex items-center justify-center bg-cover h-4/6 hidden sm:block">
                <img class="w-full h-full object-cover overflow-hidden   bg-center " src="{{asset('login-page-bg.jpg')}}" alt="login image">
            </div>
            <div class="t6gkcSf0Bt4MLItXvDJ_ IvHclGgvMLtYg_ow0uba b2voPh7pqNbYIn9ArgrM BJhi2nPur3FVtXfbBkqr _RuYfOgGb_Zp_Qy2emT5 vXKUKRP3PRKQ_RH5opI2">
                <h2 class="q1oXbofRCOhVhOSB8tiU IOPhczRgtphv6NdNBDjj __9sbu0yrzdhGIkLWNXl _oly1OhnXZd0iSfUzCDU OyABRrnTV_kvHV7dJ0uE">
                    Sign in to Patterns

                </h2>
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                    <form class="R2oNx0cNtxO_M_VVt390 qDsn8ha5_HppqMcLKJwF" method="POST" action="{{ route('login') }}">
                        @csrf

                    <div>
                        <label for="email" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Your email</label>
                        <input type="email" name="email" id="email" class="jtAJHOc7mn7b4IKRO59D pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk __9sbu0yrzdhGIkLWNXl gx_pYWtAG2cJIqhquLbx mveJTCIb2WII7J4sY22F GdTcGtoKP5_bET3syLDl LceKfSImrGKQrtDGkpBV _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ olxDi3yL6f0gpdsOFDhx jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP H7KQDhgKsqZaTUouEUQL OyABRrnTV_kvHV7dJ0uE KpCMWe32PQyrSFbZVput q6szSHqGtBufkToFe_s5" placeholder="name@patterns.net" required="">
                    </div>
                    <div>
                        <label for="password" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Your password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="jtAJHOc7mn7b4IKRO59D pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk __9sbu0yrzdhGIkLWNXl gx_pYWtAG2cJIqhquLbx mveJTCIb2WII7J4sY22F GdTcGtoKP5_bET3syLDl LceKfSImrGKQrtDGkpBV _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ olxDi3yL6f0gpdsOFDhx jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP H7KQDhgKsqZaTUouEUQL OyABRrnTV_kvHV7dJ0uE KpCMWe32PQyrSFbZVput q6szSHqGtBufkToFe_s5" required="">
                    </div>
                    <div class="YRrCJSr_j5nopfm4duUc _7_AEkSp_Gi6KH9ZW6st">
                        <div class="YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2 rxe6apEJoEk8r75xaVNG">
                            <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="E9GV5sZJIbfO_GEQ_moc _o2IXcpM0qnG3JPReKus vpDN1VEJLu5FmLkr5WCk Y3FxyuXtj2gecrGXvLEI jtAJHOc7mn7b4IKRO59D focus:ring-3 KmgKPWh7pHX4ztLneO0T BO8JrKgx4qkHG27c4wVR _GL8_lXmAgroY9ZBWGLH jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP" required="">
                        </div>
                        <div class="oA7zcT_42jVeFuWTXQnq c8dCx6gnV43hTOLV6ks5">
                        <label for="remember" class="ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">{{ __('Remember me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="zjZIaeYZzHaaBqxD5KzF c8dCx6gnV43hTOLV6ks5 OQflBVxALl1Ntbyc2J2_ oJZU4OQzzfXeLbF7UKZ_ fZf6W_ZtzEh6EEqmWMA9">Lost Password?</a>
                        @endif
                    </div>
                    <button type="submit" class="t6gkcSf0Bt4MLItXvDJ_ ZjWEEmDsdPvU2GdH53LK i8v96MUlFwGv9qJUkAx7 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe ijrOHNoSVGATsWYKl4Id y6GKdvUrd7vp_pxsFb57 g40_g3BQzYCOX5eZADgY mveJTCIb2WII7J4sY22F YoPCmQ0E_V5W0GGmSIdm _dylIDxYTN3qgvD4U597 KmgKPWh7pHX4ztLneO0T icxWjIgUd9_dzYucx1nx d8_fVOcgDmbt7UdpfeLK WuKugQzwTT7o1wwBck2R _ZsTMX_gz275093orLWM">   {{ __('Login to your account') }}</button>

                     {{-- <x-button  type="submit" class="t6gkcSf0Bt4MLItXvDJ_ ZjWEEmDsdPvU2GdH53LK i8v96MUlFwGv9qJUkAx7 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe ijrOHNoSVGATsWYKl4Id y6GKdvUrd7vp_pxsFb57 g40_g3BQzYCOX5eZADgY mveJTCIb2WII7J4sY22F YoPCmQ0E_V5W0GGmSIdm _dylIDxYTN3qgvD4U597 KmgKPWh7pHX4ztLneO0T icxWjIgUd9_dzYucx1nx d8_fVOcgDmbt7UdpfeLK WuKugQzwTT7o1wwBck2R _ZsTMX_gz275093orLWM">
                        {{ __('Login to your account') }}
                    </x-button> --}}
                    <div class="c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe PeR2JZ9BZHYIH8Ea3F36 XIIs8ZOri3wm8Wnj9N_y">
                        Not registered? <a href="{{ route('register') }}" class="OQflBVxALl1Ntbyc2J2_ oJZU4OQzzfXeLbF7UKZ_ fZf6W_ZtzEh6EEqmWMA9">Create account</a>
                    </div>





                </form>
            </div>
        </div>
    </div>

    </main>





        <script src="https://flowbite.com/application-ui/demo/app.bundle.js"></script>

    </body></html>
    </x-guest-layout>
