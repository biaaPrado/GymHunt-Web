@extends('layout.site')
@section('titulo', 'GymHunt - Perfil')
@section('content') 

<div class="flex flex-col justify-between bg-gymhunt-gray-1" > <!-tela inteira->
    <div class="w-full h-[200px]">
        <img class="w-full" src=".\img\banner.png" alt="">
    </div>
    
    <div class="items-center w-full flex flex-row"> <!-header infos do perfil->
        <div class="ml-12 w-60 h-60"> <img class="w-full" src=".\img\avatar.png" alt=""> </div>         
        
        <div class="w-full flex flex-row justify-between ">
            <div class="m-4 space-y-2">
                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <h3 class="font-bold text-3xl">Gilmar dos Santos</h3>
                </div>

                <div class="flex flex-rol items-end space-x-6 font-poppins">
                    <p class="font-medium"><b>400</b> seguidores</p>
                    <p class="font-medium"><b>690</b> seguindo</p>
                    <div class="flex flex-row items-center space-x-2">
                        <div class="rounded-full bg-blue-400 w-6 h-6"></div>
                        <p>Seguidores em comum</p>
                    </div>
                </div>
            </div>
    
            <div class="flex flex-rol font-poppins text-white space-x-3 my-4 mx-6">
                <div>
                    <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl">. . .</button>
                </div>

                <div>
                    <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl">Seguir</button>
                    <button class="bg-gymhunt-purple-2 text-lg py-2 px-3 rounded-2xl"> <i class="fa-regular fa-pen-to-square fa-lg"></i> Editar perfil</button>

                </div>
            </div>
        </div>
    </div>

    <div class="mx-12 space-y-3 font-poppins">
        <p class="line-clamp-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda facere inventore tempore iusto reiciendis at odio, tempora asperiores mollitia eum corrupti modi quos eaque sit error quaerat rem sequi iure!</p> 
        <div class="flex flex-rol items-end space-x-8 space-y-2" >
            <p> <i class="fa-solid fa-location-dot"></i> Bauru - SP </p>
            <p> <i class="fa-regular fa-calendar-days"></i> Desde 28 de fevereiro de 2023</p>  <!-- data de inclusão  -->
        </div>

        <div class="w-full h-0.5 bg-slate-950"></div>

        <div class="grid grid-cols-4 gap-4 mb-96-">
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image (1).png" alt=""></a>
            <a href="#"> <img class="w-550" src=".\img\image.png" alt=""></a>
        </div>
    </div>
</div>

<div class="fixed inset-0 flex flex-col w-screen h-screen p-8 gap-8 z-20" x-data="{
    selected: null,

    closeModal() {
        enableScroll();
        
    }
}" @update::close="closeModal()">
    <!-- Overlay  -->
    <div class="bg-black bg-opacity-20 fixed inset-0 " x-on:click="closeModal()"></div>

    <form method="POST" class="self-center w-full flex bg-white p-6 rounded-2xl max-w-xl z-20"  enctype="multipart/form-data" >

        <div class="flex flex-col w-full gap-4 space-y-2">
            <div class="grid grid-flow-col justify-center items-stretch space-x-3">
                <div class="flex flex-col">
                    <div class="w-30 h-30"> <img class="w-full" src=".\img\avatar.png" alt=""></div>
                    <p>Escolher foto</p>         
                </div>
                <div class="flex flex-col items-center">
                    <img class=" h-28 w- rounded-lg" src=".\img\image.png" alt="">
                    <p>Escolher foto</p>
                </div>
            </div>
            <div class="w-full h-0.5 bg-slate-950"></div>
            <x-form.text name="name" label="Nome" placeholder="Digite seu nome completo"/>
            <x-form.text name="email" label="Email" type="email" placeholder="ex: email@gmail.com"/>
            <x-form.text name="bio" label="Biografia" type="textarea" placeholder=""/>
            <x-form.text name="dataNasc" label="Data de nascimento" type="date"/>
            <div class="grid grid-flow-col justify-stretch space-x-2">
                <x-form.text name="phone" label="Telefone" placeholder="ex: XXXXXXXXXXXXX"/>
                <x-form.text name="cpf" label="CPF" type="text"/>
            </div>

            <div class="grid grid-flow-col justify-between space-x-2">
                <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-2 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancelar</button>
                <button type="submit" class="justify-center rounded-lg bg-gymhunt-purple-1 px-5 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </div>
    </form>
</div>

@endsection