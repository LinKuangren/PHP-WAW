<div class="container ">
    <h1>Profils</h1>
    <div class="md:flex md:items-center mb-6">
        <div class="">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nomVoyage">Intitulé</label>
        </div>
        <h3><?= $data['user']->getEmail() ?></h3>
    </div>
    <form action="" method="POST" class="w-full">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="passwordUser">Mot de passe</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" id="password" name="password" minlength="8" required>
            </div>
            </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="passwordVerif">Confirmation du mot de passe</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" id="passwordVerif" name="passwordVerif" minlength="8" required>
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Modifier mon mot de passe
                </button>
            </div>
        </div>
    </form>
    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
                <a href="index.php?page=logout">Deconnexion</a>
        </div>
    </div>
</div>