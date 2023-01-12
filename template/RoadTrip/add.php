<div class="container w-full mt-5">
    <h1 class="text-4xl text-center mb-12">Ajouter un road trip</h1>
    <form action="" method="POST" class="w-full place-items-center">
        <h2 class="flex md:items-center mb-6 justify-center text-3xl">Informations générales</h2>
        <hr class="mb-6">
        <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
            <div class="md:w-1/6">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                       for="nomVoyage">Intitulé</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                       type="text" id="nomVoyage" name="nomVoyage" placeholder="Voyage..." required>
            </div>
        </div>
        <div class="w-4/5 sm:w-3/6 lg:w-2/6 mt-10">
            <label class="block text-gray-700 text-sm font-bold my-2" for="file">Image</label>
            <input class="input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" type="file" id="file" name="file" accept="image/png, image/jpeg">
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="typeVehicule">Véhicule</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                       type="text" id="typeVehicule" name="typeVehicule" placeholder="Voiture, Moto,..." required>
            </div>
        </div>
        <div class="md:flex md:items-center md:mb-6 justify-center max-[600px]:m-6">
            <div class="md:w-1/6">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">Description</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                       type="text" id="description" name="description" placeholder="bla bla bla" required>
            </div>
        </div>

        <!-- Checkpoints -->
        <h2 class="flex md:items-center mb-6 justify-center text-3xl">Check-points</h2>
        <hr>
        <div class="grid grid-cols-3 gap-4 mt-5 max-[600px]:grid-cols-1 m-4">
            <div class="card w-46 bg-base-100 shadow-xl bg-[#FEEFDD]">
                <div class="card-body">
                    <h3 class="card-title border-double border-b-2 border-black">Départ</h3>
                    <label class="flex flex-col">Nom du road trip
                        <input type="text" placeholder="Paris" name="checkPoint[checkPointDepart][nom]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Coordonnées du road trip
                        <input type="text" placeholder="56 Rue Monsieur le Prince, Paris, 75006"
                               name="checkPoint[checkPointDepart][coordonnees]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Date de départ
                        <input type="date" placeholder="Date depart" name="checkPoint[checkPointDepart][date_depart]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Date d'arrivée
                        <input type="date" placeholder="Date arrive" name="checkPoint[checkPointDepart][date_arrive]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                </div>
            </div>

            <div id="add-etape" class="flex justify-center items-center">
                <button class="border-black border-2 w-1/3 h-10 rounded-md">
                    + Ajouter etape
                </button>
            </div>
            <div class="card w-46 bg-base-100 shadow-xl bg-[#FEEFDD]">
                <div class="card-body">
                    <h3 class="card-title border-double border-b-2 border-black">Arrivée</h3>
                    <label class="flex flex-col">Nom du road trip
                        <input type="text" placeholder="Marseille" name="checkPoint[checkPointArrive][nom]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Coordonnées du road trip
                        <input type="text" placeholder="345 impasse Pireau, Marseille"
                               name="checkPoint[checkPointArrive][coordonnees]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Date de départ
                        <input type="date" placeholder="Date depart" name="checkPoint[checkPointArrive][date_depart]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                    <label class="flex flex-col"> Date d'arrivée
                        <input type="date" placeholder="Date arrive" name="checkPoint[checkPointArrive][date_arrive]"
                               class="rounded-md border-gray-400 border-2"
                               required>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex md:items-center justify-center m-6">
            <button class="shadow bg-[#6699CC] hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                Enregistrer
            </button>
        </div>
    </form>
</div>


<script>
    $(document).ready(function () {
        let i = 1;
        $('#add-etape').on('click', function () {
            let card = `<div class="card w-46 bg-base-100 shadow-xl bg-[#FEEFDD]">
                            <div class="card-body">
                                <h3 class="card-title border-double border-b-2 border-black">Etape ${i}</h3>
                                <label class="flex flex-col">Nom du road trip
                                <input type="text" placeholder="Toulouse" name="checkPoint[checkPoint${i}][nom]" class="rounded-md border-gray-400 border-2" required></label>
                                <label class="flex flex-col"> Coordonnées du road trip</label>
                                <input type="text" placeholder="62 rue Dumont Piras, Toulouse, 36002" name="checkPoint[checkPoint${i}][coordonnees]" class="rounded-md border-gray-400 border-2" required></label>
                                <label class="flex flex-col"> Date de départ
                                <input type="date" placeholder="Date depart" name="checkPoint[checkPoint${i}][date_depart]" class="rounded-md border-gray-400 border-2" required></label>
                                <label class="flex flex-col"> Date d'arrivée
                                <input type="date" placeholder="Date arrive" name="checkPoint[checkPoint${i}][date_arrive]" class="rounded-md border-gray-400 border-2" required></label>
                            </div>
                        </div>`;
            $(card).insertBefore($(this));
            i = i + 1;
        });
    });
</script>


