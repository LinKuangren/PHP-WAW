<div class="relative w-full">
    <img src="img/imgHeader/imgFondAuthentification.jpeg" class="w-full max-h-full opacity-50" alt="Image de fond du titre représentant un van devant une plage">
    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
        <h1 class="text-black text-4xl font-bold">Connexion</h1>
    </div>
</div>
<div>
<div class="flex w-full mt-5 mb-10 items-center flex-col" >
    <form action="" method="POST" class="w-full max-w-sm card p-10 bg-base-100 shadow-xl bg-[#FEEFDD]">
        <div class="md:flex md:flex-col mb-6">
            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="email">Email</label>
            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="email" id="email" name="email" placeholder="Email address" required>
        </div>
        <div class="md:flex md:flex-col mb-6">
            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="password">
                Mot de passe
            </label>
            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="password" id="password" name="password" minlength="8" required>
        </div>
        <div class="flex justify-center">
           <a href="index.php?page=home" class="hover:underline-offset-1 hover:underline">
            Mot de passe oublié ?
           </a>
        </div>
        <div class="flex md:items-center justify-center m-2">
            <button class="shadow bg-[#6699CC] hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                Enregistrer
            </button>
        </div>
    </form>
    <div class="flex justify-center mt-4">
        <a href="index.php?page=register" class="text-[#6699CC]">
            Pas encore inscrit ?
        </a>
    </div>
</div>
