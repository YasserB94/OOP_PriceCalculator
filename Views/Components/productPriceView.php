<div class="w-100 flex justify-center m-5">
<div class="mt-5 p-6 w bg-white rounded-lg border border-lime-200 shadow-md hover:bg-lime-100 dark:bg-lime-800 dark:border-lime-700 dark:hover:bg-lime-700 w-2/4">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hello <?=$selectedCustomer->getName();?> From <?=$selectedCustomer->getGroupName()?></h5>
    <p class="font-normal text-lime-700 dark:text-gray-400">The <?=$selectedProduct->getName()?> would cost you: <?=$selectedProductPrice?></p>
</div>
</div>