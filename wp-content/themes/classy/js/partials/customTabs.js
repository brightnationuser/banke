export default function customTabs(userOptions) {
    const defaultOptions = {
        wrapperClass: ".custom-tabs",
        navTabsClass: ".nav-tabs",
        tabContentClass: ".tab-pane"
    };

    const mergedOptions = Object.assign({}, defaultOptions, userOptions);

    const customTabsWrappers = document.querySelectorAll(
        defaultOptions.wrapperClass
    );

    for (let i = 0; i < customTabsWrappers.length; i++) {

        const customTabs = customTabsWrappers[i].querySelectorAll(
            `ul${mergedOptions.navTabsClass} > li`
        );

        function tabClick(tabClickEvent) {

            for (let i = 0; i < customTabs.length; i++) {
                customTabs[i].classList.remove("active");
            }

            const clickedTab = tabClickEvent.currentTarget;

            clickedTab.classList.add("active");

            tabClickEvent.preventDefault();

            const customTabsContentPanes = customTabsWrappers[i].querySelectorAll(
                mergedOptions.tabContentClass
            );

            for (let i = 0; i < customTabsContentPanes.length; i++) {
                customTabsContentPanes[i].classList.remove("active");
            }

            const anchorReference = tabClickEvent.target;

            const activePaneId = anchorReference.getAttribute("href");

            const activePane = customTabsWrappers[i].querySelector(activePaneId);

            activePane.classList.add("active");
        }

        for (let i = 0; i < customTabs.length; i++) {
            customTabs[i].addEventListener("click", tabClick);
        }
    }
}