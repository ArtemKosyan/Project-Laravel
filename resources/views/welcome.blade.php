<?php 
use App\Models\articles;
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>   
            .more {
                width: 300px;
                height: 50px;
                text-align: center;
                padding: 15px;
                border: 3px solid #0000cc;
                border-radius: 10px;
                color: #0000cc;
                background-color: #8FBC8F;
                display: none;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                margin: auto;
            }
            .more:target {display: block;}
            .close {
                display: inline-block;
                border: 1px solid #0000cc;
                color: #0000cc;
                padding: 0 px;
                margin: 0px;
                text-decoration: none;
                background: #f2f2f2;
                font-size: 14pt;
                cursor:pointer;
               
            }
            .close:hover {background: #e6e6ff;}
        </style>
    </head>
    <body class="antialiased", bgcolor="#FFFAFA">
        
        <div class="">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            
        </div>
        <h1>Главная страница</h1> 
        <h2>Статьи наших пользователей:</h2>
        <?php
            $i=-1;
            $articles = articles::all();
            foreach($articles as $article) {
                $i=$i+1;
                ?>
                <div style="margin-left:168px; width:1200px; background-color: #D3D3D3">
                    <label style="height:40px; width:140px; color: #000080"><?php echo("$article->topic") ?></label>
                    <br>
                    <label   style="height:40px; width:140px; padding: 32px">
                        <?php
                        $shorttextarticle=$article->text;
                        echo substr("$shorttextarticle", 0, 400) ?>...</label>
                </div>
                
                <div id="more<?php echo $i?>" style="width: 900px; height: 500px;" class="more">
                    <a href="/"  style="height:30px;width:60px"   class="close">Close</a>
                    <br>
	                <br>
	                <textarea style="height:420px;width:900px; resize: none" align="right" readonly><?php echo("$article->text") ?></textarea>
                </div>
                
                <button type="button" onclick="location.hash='more<?php echo $i?>'" style="height: 30px; width: 150px; background: #808000; margin-left:170px" >Подробнее..</button>
                <br>
                <br>

                <?php 
            }
        ?>
      
    </body>
</html>
