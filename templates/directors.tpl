<div>
<table>
    <thead>
        <tr>
            <td>Directors</td>
        </tr>
    </thead>
    <tbody>
        
        {foreach from=$directors item=$director}
            <tr>
                <td>{$director->Director}</td>
                <td><button><a href='view/director/{$director->Director_id}'>filtrar</a></button></td>
                
                {if isset($smarty.session.USER_ID)}
                    <td><button><a href="warning/director/{$director->Director_id}">eliminar</a></button></td>
                    <td>
                        <form action="edit/director/{$director->Director_id}" method="POST">
                        <input type="text" name="director" placeholder="Director">
                        <input type="submit" value="Editar">
                        </form>
                    </td>
                {/if}
            
            </tr>
        {/foreach}
    
    </tbody>
</table>

{if isset($smarty.session.USER_ID)}
    <form action="add/director/" method="POST">
        <input type="text" name="director" placeholder="Director">
        <input type="submit" value="Agregar">
    </form>
{/if}

</div>