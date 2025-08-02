class Theme {
    constructor() {
        this.night_icon = `<i class="bi bi-moon-fill fs-4"></i>`;
        this.day_icon = `<i class="bi bi-brightness-high-fill fs-4"></i>
        `;
    }
    set_theme_state(state) {
        document.documentElement.setAttribute("data-bs-theme", state);
    }
    get_theme_state() {
        return localStorage.getItem("theme") ?? "";
    }
    get_theme_icon() {
        if (!localStorage.getItem("theme")) {
            return this.night_icon;
        }
        return localStorage.getItem("theme") == "dark"
            ? this.day_icon
            : this.night_icon;
    }
    change_theme(e) {
        if (localStorage.getItem("theme")) {
            localStorage.removeItem("theme");
            this.set_theme_state(this.get_theme_state());
            e.innerHTML = this.night_icon;
            return;
        }
        localStorage.setItem("theme", "dark");
        this.set_theme_state(this.get_theme_state());
        e.innerHTML = this.day_icon;
    }
}
const theme = new Theme();
