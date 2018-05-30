module.exports = [
	{
		entry: './src/sass/style.scss',
		output: {
			filename: 'style-bundle.js',
		},
		module: {
			rules: [{
				test: /\.scss$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: './dist/css/style.css',
						},
					},
					{loader: 'extract-loader'},
					{loader: 'css-loader'},
					{
						loader: 'sass-loader',
						options: {
							includePaths: ['./node_modules']
						}
					},
				]
			}]
		},
	}
];
