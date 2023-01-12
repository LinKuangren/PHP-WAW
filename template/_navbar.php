<header>
    <nav class="navbar bg-[#FEEFDD] text-black shadow-lg">
        <div class="navbar-start">
            <a class="btn btn-ghost normal-case text-xl">WaW</a>
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
            </div>
            
        </div>
        <div class="navbar-end hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                <li class="hover:text-[#6699CC]">
                    <a href="index.php?page=home">Accueil</a>
                </li>
                <li class="hover:text-[#6699CC]">
                    <a href="index.php?page=allRoadTrip">Liste des Road Trip</a>
                </li>
                <?php if(!isset($_SESSION['user'])){ ?>
                    <li class="hover:text-[#6699CC]">
                        <a href="index.php?page=register">S'enregistrer</a>
                    </li>
                    <li class="hover:text-[#6699CC]">
                        <a href="index.php?page=login">Se connecter</a>
                    </li>
                <?php }else{ ?>
                    <li class="hover:text-[#6699CC]">
                        <a href="index.php?page=addRoadTrip">Créer un road trip</a>
                    </li>
                    <li class="hover:text-[#6699CC]">
                        <a href="index.php?page=logout">Deconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php if(isset($_SESSION['user'])){ ?>
            <div class="navbar-end">
                <a href="index.php?page=user_profile" class="btn">Mon Profil</a>
            </div>
        <?php } ?>
    </nav>
</header>