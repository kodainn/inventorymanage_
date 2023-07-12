<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        //全て削除
        var deleteButton = document.getElementById('community-delete');
        deleteButton.addEventListener('click', function()
        {
            var confirmDelete = confirm('本当に削除しますか？');
            if (confirmDelete)
            {
                location.href = "http://localhost/inventorymanage_/communityDelete.php";
            }
        });
    });
</script>