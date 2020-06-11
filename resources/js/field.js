Nova.booting((Vue, router, store) => {
    // Attach the custom detail header.
    Vue.component(
        "custom-detail-header",
        require("./components/CustomDetailHeader")
    );
});
