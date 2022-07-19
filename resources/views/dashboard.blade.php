<?php 
use App\Models\articles;
?>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <ul class="nav nav-pills">
		        <li class="nav-item"><a href="/" class="nav-link active" style="background-color: #D3D3D3" aria-current="page">Перейти на главную</a></li>		
	        </ul>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Добро пожаловать в личный кабинет
                </div>
            </div>
        </div>
    </div>
    
    <form action="dashboardcreatearticle" method="post">
        @csrf
        <div align="center" class="">
            <input type="text" name="topic" placeholder="Тема статьи" id="topic" style="height:40px;width:1200px">
            <br>
            <textarea resize: none name="text" id="text" style="height:360px;width:1200px"></textarea>
        </div>
        @if($errors->any())
			<div style="margin-left:168px" class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>
							<font size="3" color="red">
							{{ $error }}
							</font>
						</li>
					@endforeach
				</ul>
			</div>
		@endif
        <div>
            <button  style="height:40px; width:140px; margin-left:168px; background-color: #00FF00" type="submit">Создать статью</button>
        </div>
    </form>
    <br>
    <h2 style="margin-left:168px; font-size: 18pt">Ваши статьи:</h2>
    <div>
        <?php
            $articles = articles::all();
            foreach($articles as $article) {
                if (Auth::id()==$article->user_id) {
                ?>
                <div style="margin-left:168px; width:1200px; background-color: #D3D3D3">
                    <label style="height:40px; width:140px; color: #000080"><?php echo("$article->topic") ?></label>
                    <br>
                    <label style="height:40px; width:140px"><?php echo("$article->text") ?></label>
                </div>
                <br>
                <?php }
            }
        ?>
    </div>
</x-app-layout>
