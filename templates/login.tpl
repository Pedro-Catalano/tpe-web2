{include file="header.tpl"}

<div class="session">
    <form action='verify' method="POST">
        <h2>{$tittle}</h2>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        
        {if $error}
            <div>
                {$error}
            </div>
        {/if}
        
        <button type="submit">LogIn</button>
    </form>
</div>

{include file="footer.tpl"}