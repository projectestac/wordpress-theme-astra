const haystack = ['core/group'];

wp.hooks.addFilter(
	'blocks.registerBlockType',
	'lh/fseFixes/layoutSettings',
	(settings, name) => {
		if (!haystack.includes(name)) {
			return settings;
		}

		const newSettings = {
			...settings,
			supports: {
				...(settings.supports || {}),
				layout: {
					...(settings.supports.layout || {}),
					allowEditing: true,
					allowSwitching: false,
					allowInheriting: true,
				},
				__experimentalLayout: {
					...(settings.supports.__experimentalLayout || {}),
					allowEditing: true,
					allowSwitching: false,
					allowInheriting: true,
				},
			},
		};
		return newSettings;
	},
	20
);
