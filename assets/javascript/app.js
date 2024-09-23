function toggleMenu() {
    var sidebar = document.getElementById('sidebar');
    var content = document.getElementById('main-content');
    sidebar.classList.toggle('open');
    content.classList.toggle('collapsed');
}
