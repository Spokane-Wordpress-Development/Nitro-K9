<?php

namespace NitroK9;

class PriceGroup {

	const DOG_LG_AGGRESSIVE_EVAL = 1;
	const DOG_LG_AGGRESSIVE_HOURLY = 2;
	const DOG_LG_STANDARD_EVAL = 3;
	const DOG_LG_STANDARD_HOURLY = 4;
	const DOG_LG_HANDS_ON_1 = 5;
	const DOG_LG_HANDS_ON_2 = 6;
	const DOG_LG_HANDS_OFF_1 = 7;
	const DOG_SM_AGGRESSIVE_EVAL = 8;
	const DOG_SM_AGGRESSIVE_HOURLY = 9;
	const DOG_SM_STANDARD_EVAL = 10;
	const DOG_SM_STANDARD_HOURLY = 11;
	const DOG_SM_HANDS_ON_1 = 12;
	const DOG_SM_HANDS_ON_2 = 13;
	const DOG_SM_HANDS_OFF_1 = 14;
	const DOG_BOARDING_PER_NIGHT = 15;
	const DOG_BOARDING_NIGHTS = 16;
	const DOG_BOOT_CAMP = 17;
	const PET_SITTING = 18;
	const PET_SITTING_VISITS = 19;
	const DOG_DAY_CARE = 20;
	const DOG_DAY_CARE_PACKAGES = 21;
	const DOG_WALKING = 22;
	const DOG_PERSONAL_PROTECTION = 23;
	const DOG_PERSONAL_PROTECTION_HOURLY = 24;
	const CAT_DAILY_VISITS = 25;

	private $id;
	private $title;
	private $is_active;
	
	/** @var Price[] $prices */
	private $prices;

	/**
	 * PriceGroup constructor.
	 *
	 * @param null $id
	 * @param null $title
	 * @param bool $is_active
	 */
	public function __construct( $id=NULL, $title=NULL, $is_active=TRUE )
	{
		$this
			->setId( $id )
			->setTitle( $title )
			->setIsActive( $is_active );
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return PriceGroup
	 */
	public function setId( $id )
	{
		$this->id = ( is_numeric( $id ) ) ? abs( round( $id ) ) : NULL;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return ( $this->title === NULL ) ? '' : $this->title;
	}

	/**
	 * @param mixed $title
	 *
	 * @return PriceGroup
	 */
	public function setTitle( $title )
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function isActive()
	{
		return ( $this->is_active === TRUE );
	}

	/**
	 * @param mixed $is_active
	 *
	 * @return PriceGroup
	 */
	public function setIsActive( $is_active )
	{
		$this->is_active = ( $is_active === TRUE || $is_active == 1 );

		return $this;
	}

	/**
	 * @return Price[]
	 */
	public function getPrices()
	{
		return ( $this->prices === NULL ) ? array() : $this->prices;
	}

	/**
	 * @param Price[] $prices
	 *
	 * @return PriceGroup
	 */
	public function setPrices( $prices )
	{
		$this->prices = $prices;

		return $this;
	}

	/**
	 * @param Price $price
	 */
	public function addPrice( $price )
	{
		if ( $this->prices === NULL )
		{
			$this->prices = array();
		}
		
		$this->prices[] = $price;
	}

	/**
	 * @return PriceGroup[]
	 */
	public static function loadPrices()
	{
		/** @var PriceGroup[] $price_groups */
		$price_groups = [];

		$default_prices = array(
			1 => array(
				'title' => 'Standard Pre-Training Evaluation Fee (Aggressive Large Dog)',
				'price' => 50
			),
			2 => array(
				'title' => 'Hourly Training Fee (Aggressive Large Dog)',
				'price' => 125
			),
			3 => array(
				'title' => 'Standard Pre-Training Evaluation Fee (Standard Large Dog)',
				'price' => 35
			),
			4 => array(
				'title' => 'Hourly Training Fee (Standard Large Dog)',
				'price' => 125
			),
			5 => array(
				'title' => 'Nitro Dog Hands On - Level 1',
				'prices' => array(
					array(
						'title' => 'Three 1-Hour Lessons',
						'price' => 240,
					),
					array(
						'title' => 'Seven 1-Hour Lessons',
						'price' => 550,
					),
					array(
						'title' => 'Fourteen 1-Hour Lessons',
						'price' => 1100,
					)
				)
			),
			6 => array(
				'title' => 'Nitro Dog Hands On - Level 2',
				'prices' => array(
					array(
						'title' => 'Three 1-Hour Lessons',
						'price' => 300,
					),
					array(
						'title' => 'Seven 1-Hour Lessons',
						'price' => 700,
					),
					array(
						'title' => 'Fourteen 1-Hour Lessons',
						'price' => 1200,
					)
				)
			),
			7 => array(
				'title' => 'Nitro Dog Hands Off - Level 1',
				'prices' => array(
					array(
						'title' => 'Three 1-Hour Lessons',
						'price' => 300,
					),
					array(
						'title' => 'Seven 1-Hour Lessons',
						'price' => 800,
					),
					array(
						'title' => 'Fourteen 1-Hour Lessons',
						'price' => 1400,
					)
				)
			),
			8 => array(
				'title' => 'Standard Pre-Training Evaluation Fee (Aggressive Small Dog)',
				'price' => 50
			),
			9 => array(
				'title' => 'Hourly Training Fee (Aggressive Small Dog)',
				'price' => 125
			),
			10 => array(
				'title' => 'Standard Pre-Training Evaluation Fee (Standard Small Dog)',
				'price' => 35
			),
			11 => array(
				'title' => 'Hourly Training Fee (Standard Small Dog)',
				'price' => 125
			),
			12 => array(
				'title' => 'Mini Heroes Hands On - Level 1',
				'prices' => array(
					array(
						'title' => 'Three 30-Minute Lessons',
						'price' => 200,
					),
					array(
						'title' => 'Seven 30-Minute Lessons',
						'price' => 300,
					),
					array(
						'title' => 'Fourteen 30-Minute Lessons',
						'price' => 550,
					)
				)
			),
			13 => array(
				'title' => 'Mini Heroes Hands On - Level 2',
				'prices' => array(
					array(
						'title' => 'Three 30-Minute Lessons',
						'price' => 220,
					),
					array(
						'title' => 'Seven 30-Minute Lessons',
						'price' => 350,
					),
					array(
						'title' => 'Fourteen 30-Minute Lessons',
						'price' => 650,
					)
				)
			),
			14 => array(
				'title' => 'Mini Heroes Hands Off - Level 1',
				'prices' => array(
					array(
						'title' => 'Three 30-Minute Lessons',
						'price' => 260,
					),
					array(
						'title' => 'Seven 30-Minute Lessons',
						'price' => 360,
					),
					array(
						'title' => 'Fourteen 30-Minute Lessons',
						'price' => 520,
					)
				)
			),
			15 => array(
				'title' => 'Boarding Per Night',
				'price' => 50
			),
			16 => array(
				'title' => 'Boarding Nights',
				'prices' => array(
					array(
						'title' => '1 Night',
						'price' => ''
					),
					array(
						'title' => '2 Nights',
						'price' => ''
					),
					array(
						'title' => '3 Nights',
						'price' => ''
					),
					array(
						'title' => '4 Nights',
						'price' => ''
					),
					array(
						'title' => '5 Nights',
						'price' => ''
					),
					array(
						'title' => '6 Nights',
						'price' => ''
					),
					array(
						'title' => '7 Nights',
						'price' => ''
					),
					array(
						'title' => 'More Than 7 Nights',
						'price' => ''
					)
				)
			),
			17 => array(
				'title' => '24 Hour Overnight Boot Camp',
				'prices' => array(
					array(
						'title' => '1 Night',
						'price' => 125
					),
					array(
						'title' => '3 Nights',
						'price' => 750
					),
					array(
						'title' => '14 Night2',
						'price' => 1350
					)
				)
			),
			18 => array(
				'title' => 'Pet Sitting',
				'price' => 110
			),
			19 => array(
				'title' => 'Pet Sitting Visits',
				'prices' => array(
					array(
						'title' => '1 Night',
						'price' => ''
					),
					array(
						'title' => '2 Nights',
						'price' => ''
					),
					array(
						'title' => '3 Nights',
						'price' => ''
					),
					array(
						'title' => '4 Nights',
						'price' => ''
					),
					array(
						'title' => '5 Nights',
						'price' => ''
					),
					array(
						'title' => '6 Nights',
						'price' => ''
					),
					array(
						'title' => '7 Nights',
						'price' => ''
					),
					array(
						'title' => 'More Than 7 Nights',
						'price' => ''
					)
				)
			),
			20 => array(
				'title' => 'Doggie Day Care',
				'prices' => array(
					array(
						'title' => 'Full Day',
						'price' => 32
					),
					array(
						'title' => 'Half Day (5 Hours or Less)',
						'price' => 20
					),
					array(
						'title' => 'Weekend Full Day',
						'price' => 25
					)
				)
			),
			21 => array(
				'title' => 'Doggie Day Care Packages',
				'prices' => array(
					array(
						'title' => '10-Day Package - One Dog',
						'price' => 275
					),
					array(
						'title' => '10-Day Package - One Dog',
						'price' => 450
					),
					array(
						'title' => '10-Day Package - Two Dogs',
						'price' => 500
					),
					array(
						'title' => '10-Day Package - Two Dogs',
						'price' => 800
					)
				)
			),
			22 => array(
				'title' => 'Dog Walking',
				'prices' => array(
					array(
						'title' => '20 Minute',
						'price' => 20
					),
					array(
						'title' => '30 Minute',
						'price' => 25
					),
					array(
						'title' => '45 Minute',
						'price' => 30
					),
					array(
						'title' => '60 Minute',
						'price' => 40
					)
				)
			),
			23 => array(
				'title' => 'Personal Protection (Ring of Fire)',
				'prices' => array(
					array(
						'title' => '7 Private Lessons',
						'price' => 1000
					),
					array(
						'title' => '14 Private Lessons',
						'price' => 1800
					),
					array(
						'title' => '28 Private Lessons',
						'price' => 3000
					)
				)
			),
			24 => array(
				'title' => 'Personal Protection Hourly Rate',
				'price' => 160
			),
			25 => array(
				'title' => 'Cat Daily Visits',
				'prices' => array(
					array(
						'title' => 'One Time',
						'price' => 20
					),
					array(
						'title' => 'Two Times',
						'price' => 30
					),
					array(
						'title' => 'Three Times',
						'price' => 35
					)
				)
			)
		);

		foreach ( $default_prices as $id => $default_price )
		{
			$price_group = new PriceGroup( $id, $default_price['title'] );

			if ( isset( $default_price['price'] ) )
			{
				$price = new Price( '', $default_price['price'] );
				$price_group->addPrice( $price );
			}
			else
			{
				foreach ( $default_price['prices'] as $p )
				{
					$price = new Price( $p['title'], $p['price'] );
					$price_group->addPrice( $price );
				}
			}

			$price_groups[ $price_group->getId() ] = $price_group;
		}

		$updated_prices = get_option( 'nitro_k9_pricing', '' );
		if ( strlen( $updated_prices ) > 0 )
		{
			$updated_prices = json_decode( $updated_prices, TRUE );
			if ( is_array( $updated_prices ) )
			{
				foreach ( $updated_prices as $id => $updated_price )
				{
					if ( isset( $updated_prices['title'] ) && strlen( $updated_prices['title'] ) > 0 )
					{
						$price_groups[ $id ]->setTitle( $updated_prices['title'] );
					}
					if ( isset( $updated_prices['is_active'] ) )
					{
						$price_groups[ $id ]->setTitle( $updated_prices['is_active'] );
					}
					if ( isset( $updated_prices['prices'] ) && is_array( $updated_prices['prices'] ) )
					{
						/** @var Price[] $prices */
						$prices = $price_groups[ $id ]->getPrices();

						foreach ( $updated_prices['prices'] as $index => $update_price )
						{
							if ( array_key_exists( $index, $prices ) )
							{
								if ( isset( $updated_price['title'] ) && strlen( $updated_price['title'] ) > 0 )
								{
									$prices[ $index ]->setTitle( $updated_price['title'] );
								}

								if ( isset( $updated_price['price'] ) )
								{
									$prices[ $index ]->setPrice( $updated_price['price'] );
								}

								if ( isset( $updated_price['is_active'] ) )
								{
									$prices[ $index ]->setIsActive( $updated_price['is_active'] );
								}
							}
						}

						$price_groups[ $id ]->setPrices( $prices );
					}
				}
			}
		}

		return $price_groups;
	}
}