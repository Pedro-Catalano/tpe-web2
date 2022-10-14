{include file="header.tpl"}
<div class="login">
    {if !isset($user)}
        <a href="login">login</a>
    {elseif isset($user)}
        <a href="logout">logout</a>
    {/if}
    </div>
    <div class="content">
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
                    {if isset($user)}
                        <td><button><a href="delete/movie/{$movie->ID}">eliminar</a></button></td>
                        <td>

                            <form action="edit/movie/{$movie->ID}" method="POST">
                            <input type="text" name="title" placeholder="Titulo">
                            <select name="director" placeholder="Director">
                                <option>Director</option>
                                {foreach from=$directors item=$director}
                                    <option value="{$director->Director}">{$director->Director}</option>
                                {/foreach}
                            </select>
                            <select name="genre" placeholder="Genero">
                                <option>Genre</option>
                                {foreach from=$genres item=$genre}
                                    <option value="{$genre->Genre}">{$genre->Genre}</option>
                                {/foreach}
                            </select>
                            <input type="submit" value="Editar">
                            </form>

                        </td>

                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {if isset($user)}
        <form action="add/movie/" method="POST">
            <input type="text" name="title" placeholder="Titulo">
            <select name="director" placeholder="Director">
                <option>Director</option>
                {foreach from=$directors item=$director}
                    <option value="{$director->Director}">{$director->Director}</option>
                {/foreach}
            </select>
            <select name="genre" placeholder="Genero">
                <option>Genre</option>
                {foreach from=$genres item=$genre}
                    <option value="{$genre->Genre}">{$genre->Genre}</option>
                {/foreach}
            </select>
            <input type="submit" value="Agregar">
        </form>
    {/if}
{include file="footer.tpl"}