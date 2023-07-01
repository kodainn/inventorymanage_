<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchBox = document.getElementById('search-box');
        var searchForm = document.getElementById('search-form');
        var table = document.getElementById('inventory-table');
        var rows = table.getElementsByTagName('tr');

        searchForm.addEventListener('submit', function(event) {
            event.preventDefault(); // フォームのデフォルトの送信動作をキャンセル

            var keyword = searchBox.value.toLowerCase().trim();

            for (var i = 1; i < rows.length; i++) { // 1から始めているのは、テーブルヘッダーをスキップするため
                var row = rows[i];
                var rowData = row.textContent.toLowerCase();

                if (rowData.includes(keyword)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
</script>