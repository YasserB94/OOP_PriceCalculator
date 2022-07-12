<div class="container flex items-center justify-center m-5">
<form method="post" class="bg-white shadow-md w-2/4 justify-center">
    <div class="flex flex-col p-2 justify-center">
    <label for="customers">Choose your name:</label>
    <select id="customers" name="customers" class="bg-lime-100 hover:bg-lime-400 p-2 rounded" >
    <?php foreach($customers as $key => $value):?>
        <option class="hover:bg-lime:200" value=<?=$key?>>
        <?=$value->getName();?>
    </option>
    <?php endforeach?>
    </select>
    </div>
    <div class="flex flex-col p-2">
    <label for="products">Choose your product:</label>
    <select id="products" name="products" class="bg-lime-100 hover:bg-lime-400 p-2 rounded" >
    <?php foreach($products as $key => $value):?>
        <option class="hover:bg-lime:200" value=<?=$key?>>
        <?=$value->getName();?>
    </option>
    <?php endforeach?>
    </select>
    </div>
    <button type="submit" class="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded">Confirm</button>
</form>
    </div>