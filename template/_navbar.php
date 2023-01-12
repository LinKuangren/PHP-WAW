<header>
    <nav class="p-5 bg-[#FEEFDD] shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center ">
            <span class="text-2xl text-black font-[Poppins] cursor-pointer">
                <img class="h-10 inline"
                src="https://tailwindcss.com/_next/static/media/social-square.b622e290e82093c36cca57092ffe494f.jpg">
                WaW
            </span>

            <span class="text-3xl text-black cursor-pointer mx-2 md:hidden block">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>
        </div>

        <ul class="md:flex md:items-center z-[10] md:z-auto md:static absolute md:bg-[#FEEFDD] bg-[#000] max-[720px]:opacity-70 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
            <li class="mx-4 my-6 md:my-0">
                <a href="index?page=home" class="text-xl max-[720px]:text-white text-black hover:text-[#6699CC] duration-500">Accueil</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="index?page=allRoadTrip" class="text-xl max-[720px]:text-white text-black hover:text-[#6699CC] duration-500">Liste des road trips</a>
            </li>
            <?php if(!isset($_SESSION['user'])){ ?>
                <li class="mx-4 my-6 md:my-0">
                    <a href="index?page=register" class="max-[720px]:text-white text-black text-xl hover:text-[#6699CC] duration-500">S'enregistrer</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="index?page=login" class="max-[720px]:text-white text-black text-xl hover:text-[#6699CC] duration-500">Se connecter</a>
                </li>
            <?php } else{ ?>  
            <li class="mx-4 my-6 md:my-0">
                <a href="index?page=addRoadTrip" class="max-[720px]:text-white text-black text-xl hover:text-[#6699CC] duration-500">Créer un road trip</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="index?page=logout" class="max-[720px]:text-white text-black text-xl hover:text-[#6699CC] duration-500">Déconnexion</a>
            </li>
            <?php } ?>
            <?php if(isset($_SESSION['user'])){ ?>
                <li>
                    <a href="index?page=profil" class="bg-[#6699CC] text-white font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded ">
                    Mon profil
                    </a>
                </li>
            <?php } ?>
        </ul>
    
    </nav>
    <script>
        function Menu(e){
            let list = document.querySelector('ul');
            e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
        }
    </script>
</header>