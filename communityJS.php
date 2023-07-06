<script>
    document.addEventListener('DOMContentLoaded', function() {
    var searchText = document.getElementById('search-text');
    var searchPulldown = document.getElementById('search-pulldown');
    var searchForm = document.getElementById('search-form');
    var cards = document.getElementsByClassName('community-card');

    // 検索機能
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault(); // フォームのデフォルトの送信動作をキャンセル

        var keyword = searchText.value.toLowerCase().trim();
        var genre = searchPulldown.value;

        Array.from(cards).forEach(function(card) {
        var title = card.querySelector('.card-title').textContent.toLowerCase();
        var cardGenre = card.querySelector('.card-genre').textContent;

        if (
            (keyword === '' || title.includes(keyword)) &&
            (genre === '' || cardGenre === genre)
        ) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
        });
    });
    });

</script>