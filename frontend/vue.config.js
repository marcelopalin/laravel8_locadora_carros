module.exports = {
    // Depuração
    configureWebpack: {
      devtool: "source-map"
    },
    pages: {
      index: {
        // entry for the page
        entry: "src/main.js",
        // the source template
        template: "public/index.html",
        // output as dist/index.html
        filename: "index.html",
        // TITULO DA PAGINA,
        // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
        title: "30 Anos - TG 02-033",
        // chunks to include on this page, by default includes
        // extracted common chunks and vendor chunks.
        chunks: ["chunk-vendors", "chunk-common", "index"]
      }
    },
    transpileDependencies: ["vuetify"]
  };
