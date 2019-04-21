<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iversoft Test</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="font-sans">
        <div id="app">
          <div class="container mx-auto">
            <header class="py-6">
              <h1>
                <img alt="Iversoft" src="/images/logo.png" style="height: 50px !important">
              </h1>
            </header>
            
            <main class="flex">
              <aside class="w-1/5">
                <section class="mb-6">
                  <h5 class="uppercase font-bold mb-4">Dashboards</h5>
                  
                  <ul class="list-reset">
                    <li class="text-sm">
                      <router-link to="/">Users</router-link>
                    </li>
                  </ul>
                </section>
                
              </aside>
              
              <div class="primary flex-1">
                <router-view></router-view>
              </div>
            </main>
          </div>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
