module.exports = {
	proxy: "reinshine-alt.test",
	port: 3000,
	files: [
		"dist/**/*.css",
		"**/*.php",
		"**/*.html"
	],
	watchOptions: {
		ignoreInitial: true,
		ignored: [
			"node_modules/**",
			"dist/manifest.json"
		]
	},
	open: false,
	notify: false,
	reloadOnRestart: true,
	ghostMode: {
		clicks: false,
		forms: false,
		scroll: false
	}
};
