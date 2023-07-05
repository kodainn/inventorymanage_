<script>
    document.addEventListener('DOMContentLoaded', function()
    {
        var searchText = document.getElementById('search-text');
        var searchPulldown = document.getElementById('search-pulldown');
        var searchForm = document.getElementById('search-form');
        var table = document.getElementById('inventory-table');
        var rows = table.getElementsByTagName('tr');
        var deleteButton = document.querySelector('.delete-button button');

        //検索機能
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault(); // フォームのデフォルトの送信動作をキャンセル

            var keyword = searchText.value.toLowerCase().trim();
            var category = searchPulldown.value;

            for (var i = 1; i < rows.length; i++)
            { // 1から始めているのは、テーブルヘッダーをスキップするため
                var row = rows[i];
                var rowData = row.textContent.toLowerCase();

                if (rowData.includes(keyword) && rowData.includes(category))
                {
                    row.style.display = '';
                } else
                {
                    row.style.display = 'none';
                }
            }
        });

        //全て削除
        deleteButton.addEventListener('click', function()
        {
            var confirmDelete = confirm('本当に全て削除しますか？');
            if (confirmDelete)
            {
                location.href = "http://localhost/----/inventoryDelete.php";
            }
        });
    });
</script>