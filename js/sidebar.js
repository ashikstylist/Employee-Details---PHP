function sidebarOpen() {
    var sidebarMain = document.getElementById('sidebar');
    var sidebarBg = document.getElementById('sidebar-bg');

    if (window.matchMedia('screen and (max-width: 600px)').matches) {
        sidebarMain.style.left = '0%';
        sidebarBg.style.display = 'block';
    }
    else {
        sidebarMain.style.left = '0%';
        sidebarBg.style.display = 'block';
    }

}

function sidebarClose() {
    var sidebarMain = document.getElementById('sidebar');
    var sidebarBg = document.getElementById('sidebar-bg');

    if (window.matchMedia('screen and (max-width: 600px)').matches) {
        sidebarMain.style.left = '-100%';
        sidebarBg.style.display = 'none';
    }
    else {
        sidebarMain.style.left = '-50%';
        sidebarBg.style.display = 'none';
    }

}