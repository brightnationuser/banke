import customTabs from "../partials/customTabs";

window.addEventListener("load", function () {
    const tabs = customTabs();

    const urlParams = new URLSearchParams(window.location.search);
    const activeTab = urlParams.get('tab');

    if (activeTab) {
        tabs.setActiveTab('#tab-' + activeTab);
    }
});