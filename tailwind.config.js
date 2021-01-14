module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: {
    content: [
      './source/css/*.css',
      './source/css/*/*.css',
      './inc/*.php',
      './inc/*/*.php',
      './inc/*/*/*.php',
      './template-parts/*.php',
      './template-parts/*/*.php',
      './*.php',
    ],
    options: {}
  },
  theme: {
    colors: {
      transparent: "transparent",
      inherit: "inherit",
			black: "#131716",
			white: "#ffffff",
      "blue-primary": "#1780c4",
      "blue-secondary": "#304770",
      "gray-light": "#efefef",
			"gray-darkest": "#323232",
			"green": "#05ae4b",
			"gray": "#4e5752",
			"yellow": "#fbb037",
			"orange": "#eb5927",
			"red": "#bd272c",
    },
    container: {
      center: true
		},
		fontFamily: {
      sans: ["Open Sans", "Helvetica Neue", "Helvetica", "Arial", "sans-serif"],
      serif: ["Sentinel A", "Sentinel B", "Bookman Old Style Regular", "serif"],
    },
    extend: {},
  },
  variants: {},
  plugins: [],
}
