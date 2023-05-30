import customTabs from "../partials/customTabs";

window.addEventListener("load", function () {
    const tabs = customTabs();
    const hash = new URL(document.URL).hash;

    if (hash) {
        tabs.setActiveTab(hash)
    }
});