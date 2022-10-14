{include file="header.tpl"}

<div class="warning">
    <h2>ADVERTENCIA</h2>
    <p>borar este genero o director borrara las siguientes {$number} peliculas</p>
    <ul>
        {foreach from=$movies item=$movie}
            <li>{$movie->Tittle}</li>
        {/foreach}
    </ul>
    <p>desea continuar de todos modos?</p>
    <a href={BASE_URL}>NO</a>
    <a href="delete/{$delete}/{$delete_id}">SI</a>
</div>

{include file="footer.tpl"}
