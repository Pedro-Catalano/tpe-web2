<div>
<table>
    <thead>
        <tr>
            <td>Generos</td>
        </tr>
    </thead>
    <tbody>
        
        {foreach from=$genres item=$genre}
            <tr>
                <td>{$genre->Genre}</td>
                <td><button><a href='view/genre/{$genre->Genre_id}'>filtrar</a></button></td>
                
                {if isset($smarty.session.USER_ID)}
                    <td><button><a href="warning/genre/{$genre->Genre_id}">eliminar</a></button></td>
                    
                    <td>
                        <form action="edit/genre/{$genre->Genre_id}" method="POST">
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
    <form action="add/genre/" method="POST">
        <input type="text" name="genre" placeholder="Genero">
        <input type="submit" value="Agregar">
    </form>
{/if}

</div>