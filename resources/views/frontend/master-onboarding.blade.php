<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <meta name="description" content="">
        <title>Profittank</title>
      <!-- css style sheets -->
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/layout.css') !!}">
      <link rel="stylesheet" href="{!! asset('assets/frontend/website/assets/css/style.css') !!}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>

    <body>
        <!-- page content  -->
        <section class="boardingSec">
            <ul>
                <li><a href="#">Get Started</a></li>
                <li><a href="#">Understanding the Results</a></li>
                <li><a href="#">Prepare for Maximum Results</a></li>
                <li><a href="{!! route('profit-generator') !!}">Take a Test Drive</a></li>
            </ul>
        </section>
    </body>
</html>