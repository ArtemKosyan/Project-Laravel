<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    
    <form action="dashboardcreatearticle" method="post">
        @csrf
        <div align="center" class="">
            <input type="text" name="topic" placeholder="Тема статьи" id="topic" style="height:40px;width:1200px">
            <br>
            <input type="text" name="text" placeholder="Текст статьи" id="text" style="height:360px;width:1200px">
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
</x-app-layout>
