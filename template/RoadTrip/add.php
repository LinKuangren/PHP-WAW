<div class="container w-full mt-5">
    <form action="" method="POST" class="w-full">
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="nomVoyage">Intitulé</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="nomVoyage" name="nomVoyage" placeholder="Voyage..." required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="typeVehicule">Véhicule</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="typeVehicule" name="typeVehicule" placeholder="Voiture, Moto,..." required>
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">Description</label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" id="description" name="description" placeholder="bla bla bla" required>
            </div>
        </div>

        <!-- Checkpoints -->

        <div class="grid grid-cols-4 gap-4 mt-5">
            <div class="card w-46 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Départ</h2>
                    <label>
                        Nom
                        <input type="text" placeholder="Nom du checkpoint" name="checkPoint[checkPointDepart][nom]" required>
                    </label>
                    <label>
                        <input type="text" placeholder="Coordonnees" name="checkPoint[checkPointDepart][coordonnees]" required>
                    </label>
                    <label>
                        <input type="date" placeholder="Date depart" name="checkPoint[checkPointDepart][date_depart]" required>
                    </label>
                    <label>
                        <input type="date" placeholder="Date arrive" name="checkPoint[checkPointDepart][date_arrive]" required>
                    </label>
                </div>
            </div>
            <button id="add-etape">Ajouter etape</button>
            <div class="card w-46 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Arrivé</h2>
                    <input type="text" placeholder="Nom du checkpoint" name="checkPoint[checkPointArrive][nom]" required>
                    <input type="text" placeholder="Coordonnees" name="checkPoint[checkPointArrive][coordonnees]" required>
                    <input type="date" placeholder="Date depart" name="checkPoint[checkPointArrive][date_depart]" required>
                    <input type="date" placeholder="Date arrive" name="checkPoint[checkPointArrive][date_arrive]" required>
                </div>
            </div>
        </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Enregistrer
                </button>
            </div>
        </div>
    </form>
</div>


<script>
    $(document).ready(function(){
        let i = 1;
        $('#add-etape').on('click', function () {
            let card = `<div class="card w-46 bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title">Etape ${i}</h2>
                                <input type="text" placeholder="Nom du checkpoint" name="checkPoint[checkPoint${i}][nom]" required>
                                <input type="text" placeholder="Coordonnees" name="checkPoint[checkPoint${i}][coordonnees]" required>
                                <input type="date" placeholder="Date depart" name="checkPoint[checkPoint${i}][date_depart]" required>
                                <input type="date" placeholder="Date arrive" name="checkPoint[checkPoint${i}][date_arrive]" required>
                            </div>
                        </div>`;
            $(card).insertBefore($(this));
            i = i + 1;
        });
    });
</script>


