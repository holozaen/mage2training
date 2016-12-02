<?php
/**
 * Example for Modifier (analog product edit form) - changes form
 */

namespace Ovc\Customtags\Ui\DataProvider\Modifier;



class Second extends AbstractModifier
{
    const DATA_SCOPE = '';
    const DATA_SCOPE_SECOND = 'second';
    const GROUP_SECOND = 'second';


    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
        [
            static::GROUP_SECOND => [
            'arguments' => [
                'data' => [
                    'config' => [
                        'componentType' => 'fieldset',
                        'label' => __('Label For Fieldset'),
                        'sortOrder' => 50,
                        'collapsible' => false
                    ]
                ]
            ],
            'children' => [
                'test_field_name' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'formElement' => 'select',
                                'componentType' => 'field',
                                'options' => [
                                    ['value' => 'test_value_1', 'label' => 'Test Value 1'],
                                    ['value' => 'test_value_2', 'label' => 'Test Value 2'],
                                    ['value' => 'test_value_3', 'label' => 'Test Value 3'],
                                ],
                                'visible' => 1,
                                'required' => 1,
                                'label' => __('Label For Element')
                            ]
                        ]
                    ]
                ]
            ]
        ]
        ]);

        return $meta;
    }

    /**
     * {@inheritdoc}
     */
    public function modifyData(array $data)
    {
        // dataarray anreichern mit Daten aus der entsprechenden Tabelle, die dem Modifier zugrunde liegt
        // Das Fieldset wird für die Daten nicht benötigt, d.h. Felernamen müssen unique sein!
        // im Beispiel ist die Tag-ID auf 5 hardgecoded - Für effektive Umsetzung mit LocatorInterface holen.
        $data[5][parent::DATA_SOURCE_DEFAULT]['test_field_name']= 'test_value_2';
        return $data;
    }
}