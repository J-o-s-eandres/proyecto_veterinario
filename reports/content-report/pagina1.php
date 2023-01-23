<page>

<!-- Cabecera -->
<page_header>
    <p><?=$cabecera?></p>
    <hr class="b-simple">
</page_header>

<!-- Pie -->
<page_footer>
<p class="center italic tl"><?=$piePagina?> /Pág.#[[page_cu]]</p>
</page_footer>

<!-- Cuerpo de la página -->
    <div class="mt-5" >
        <h3 class="center">Reporte de Mascotas</h3>
        <hr>

        <table class="tfull">
            <thead>
                <tr>
                    <th style="width:13%;">Raza</th>
                    <th style="width:20%;">Nombre</th>
                    <th style="width:25%;">Fecha Nacimiento</th>
                    <th style="width:10%;">Peso</th>
                    <th style="width:7%;">Color</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaMascotas as $mascota): ?>
                    <tr>
                        <td class="center mb-4 bold tl"><?=$mascota["nombreRaza"]?></td>
                        <td class="mt-2 italic tl"><?=$mascota["nombre"]?></td>
                        <td class="mt-2 italic tl"><?=$mascota["fechaNac"]?></td>
                        <td class="mt-2 italic tl"><?=$mascota["peso"]?></td>
                        <td class="italic"><?=$mascota["color"]?></td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</page>