/**
 * External dependencies
 */
import classnames from 'classnames';
import { useBlockProps } from '@wordpress/block-editor';
import { Disabled } from '@wordpress/components';
import { innerBlockAreas } from '@woocommerce/blocks-checkout';

/**
 * Internal dependencies
 */
import {
	FormStepBlock,
	AdditionalFields,
	AdditionalFieldsContent,
} from '../../form-step';
import Block from './block';
import {
	useCheckoutBlockContext,
	useCheckoutBlockControlsContext,
} from '../../context';

export const Edit = ( {
	attributes,
	setAttributes,
}: {
	attributes: {
		title: string;
		description: string;
		showStepNumber: boolean;
		className: string;
	};
	setAttributes: ( attributes: Record< string, unknown > ) => void;
} ): JSX.Element => {
	const { allowCreateAccount } = useCheckoutBlockContext();
	const { accountControls: Controls } = useCheckoutBlockControlsContext();
	return (
		<FormStepBlock
			attributes={ attributes }
			setAttributes={ setAttributes }
			className={ classnames(
				'wc-block-checkout__contact-fields',
				attributes?.className
			) }
		>
			<Controls />
			<Disabled>
				<Block allowCreateAccount={ allowCreateAccount } />
			</Disabled>
			<AdditionalFields block={ innerBlockAreas.CONTACT_INFORMATION } />
		</FormStepBlock>
	);
};

export const Save = (): JSX.Element => {
	return (
		<div { ...useBlockProps.save() }>
			<AdditionalFieldsContent />
		</div>
	);
};
