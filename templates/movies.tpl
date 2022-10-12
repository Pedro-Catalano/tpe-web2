{include file="header.tpl"}

<div class="dirandgenre">
    {include file="directors.tpl"}
    {include file="genres.tpl"}
</div>
<table>
    <thead>
        <tr>
            <td>Pelicula</td>
            <td>Director</td>
            <td>Genero</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$movies item=$movie}
            <tr>
                <td>{$movie->Tittle}</td>
                <td>{$movie->Director}</td>
                <td>{$movie->Genre}</td>
                <td><button><a href='view/movie/{$movie->ID}/'>Ver</a></button></td>
                {if isset($smarty.session.USER_ID)}
                    <td><button><a href="delete/movie/{$movie->ID}">eliminar</a></button></td>
                    <td>

                        <form action="edit/movie/{$movie->ID}" method="POST">
                        <input type="text" name="title" placeholder="Titulo">
                        <input type="text" name="director" placeholder="Director">
                        <input type="text" name="genre" placeholder="Genero">
                        <input type="submit" value="Editar">
                        </form>

                    </td>

                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>
{if isset($smarty.session.USER_ID)}
    <form action="add/movie/" method="POST">
        <input type="text" name="title" placeholder="Titulo">
        <input type="text" name="director" placeholder="Director">
        <input type="text" name="genre" placeholder="Genero">
        <input type="submit" value="Agregar">
    </form>
{/if}
{include file="footer.tpl"}