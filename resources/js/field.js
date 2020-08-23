Nova.booting((Vue, router, store) => {
    // Attach the custom detail header.
    Vue.component(
        "custom-detail-header",
        require("./components/CustomHeader")
    );
    // Attach the custom detail header.
    Vue.component(
        "custom-create-header",
        require("./components/CustomHeader")
    );
    // Attach the custom detail header.
    Vue.component(
        "custom-update-header",
        require("./components/CustomHeader")
    );
    // Attach the custom detail header.
    Vue.component(
        "custom-attach-header",
        require("./components/CustomHeader")
    );
});
