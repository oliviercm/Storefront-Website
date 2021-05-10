-- WARNING: This script is destructive! Running this script will destroy and recreate databases and tables for the storefront app.
CREATE DATABASE IF NOT EXISTS storefront;
USE storefront;
DROP TABLE IF EXISTS products;
CREATE TABLE products(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_json JSON
);
INSERT INTO products VALUES
    (default, '{
        "name": "Masks (50 ct)",
        "images": [
            "product1.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 18.99
        },
        "discount_price": {
        },
        "description": [
            "Suitable for offices, schools, and outdoors.",
            "Made of 3 ply layers and premium non woven fabric, blocking and filtering small particles in the air.",
            "This face mask is designed with an adjustable elastic ear loop.",
            "Breathable, soft and comfortable, gentle to skin.",
            "Disposable masks: 50pc face masks."
        ]
    }'),
    (default, '{
        "name": "Germ-X Hand Sanitizer (8 fl oz.)",
        "images": [
            "product2.png"
        ],
        "rating": 4,
        "stock": 15,
        "price": {
            "usd": 6.99
        },
        "discount_price": {
        },
        "description": [
            "Kills 99.99% of many common harmful germs and bacteria in as little as 15 seconds.",
            "Great alternative when soap and water are not available.",
            "Moisturizing with Vitamin E.",
            "Sooths and Moisturizes.",
            "Subtle and Refreshing Fragrance."
        ]
    }'),
    (default, '{
        "name": "Nitrile Gloves (100 ct)",
        "images": [
            "product3.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 26.99
        },
        "discount_price": {
        },
        "description": [
            "The ideal solution for individuals sensitive to natural rubber latex and donning powder.",
            "Comfortable fit with textured fingertips for excellent tactile sensitivity.",
            "Extraordinary strength, stretchable durability and puncture resistance with premium iris blue color.",
            "Commonly used by law enforcement professionals, tattoo artists, physicians and first responders.",
            "Features smooth external finish and beaded cuff for extra durability."
        ]
    }'),
    (default, '{
        "name": "Sanitizer Wipes (3 boxes)",
        "images": [
            "product4.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 11.99
        },
        "discount_price": {
        },
        "description": [
            "Clorox Disinfecting Wipes are proven to kill COVID-19 Virus in 30 seconds; cleans and kills 99.9% of viruses and bacteria with powerful, triple-layered wipe.",
            "New easy to pull flip top pack allows for the easiest way to clean and disinfect: open with 1 hand dispenses 1 wipe at a time.",
            "Germs and messes occur on more than kitchen counters and bathroom surfaces, conveniently tackle any tough surface including finished wood sealed granite and stainless steel.",
            "Easy to stack space saving pack allows you to take Clorox Disinfecting wipes anywhere including on the go.",
            "Disinfect and deodorize with the fresh smell of Clorox disinfecting wipes for a bleach-free, all-in-1 cleaning alternative. Safely wipe down toys, remotes, or clean up car spills with these sanitizing wipes."
        ]
    }'),
    (default, '{
        "name": "Ivory Soap (4 pc)",
        "images": [
            "product5.png"
        ],
        "rating": 5,
        "stock": 100,
        "price": {
            "usd": 9.99
        },
        "discount_price": {
        },
        "description": [
            "Made with pure and purposeful ingredients.",
            "Is perfect for your family. Great for hands, face and body.",
            "Free of Sulfates, parabens, heavy perfumes and dyes."
        ]
    }'),
    (default, '{
        "name": "Band-aids Assorted",
        "images": [
            "product6.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 6.99
        },
        "discount_price": {
        },
        "description": [
            "Band-Aid Brand Flexible Fabric Adhesive Bandages for first aid and wound protection of minor wounds, cuts, scrapes and burns.",
            "Made with Memory-Weave fabric for comfort and flexibility, these bandages stretch, bend, and flex with your skin as you move, and include a Quilt-Aid comfort pad designed to cushion painful wounds which may help prevent reinjury.",
            "These Band-Aid Brand Flexible Fabric adhesive bandages stay on for up to 24 hours and feature a unique Hurt-Free Pad that won\'t stick to the wound as they wick away blood and fluids, allowing for gentle removal.",
            "From the #1 doctor recommended bandage brand, Band-Aid Brand Adhesive Bandages help protect against dirt and germs that may cause infection. Plus, wounds covered with a bandage heal faster than uncovered wounds.",
            "Apply bandage to clean, dry skin for minor wound care and change daily, when wet or as needed. For proper wound care, treat with wound an antiseptic ointment such as Neosporin prior to application."
        ]
    }'),
    (default, '{
        "name": "Gauze Rolls",
        "images": [
            "product7.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 11.99
        },
        "discount_price": {
            "usd": 9.99
        },
        "description": [
            "Efficient and Effective: Our white gauze wrap rolls have been designed to secure the wound dressings effectively in place, efficiently reducing the risk of infections. The Stretch formula ensures gentle pressure over the wound while providing adequate breathability for its fast-paced recovery.",
            "Hospital Gauze Grade: The roller gauze has been developed with latex-free raw materials. The high-grade polyester-cotton rolls medically have been proven to be lint-free which prevents cotton fiber strands from sticking to the wound and ensures a pain-free removal experience to the user.",
            "Low-Cost: These non-sterile gauze bandage rolls have been manufactured in a clean and sanitary environment. They are packaged individually to maintain utter hygiene, absolutely diminishing the need for expensive and high-cost sterile gauze rolls.",
            "User-Friendly: Using our medical gauze rolls, one can timely provide first aid to oneself or their loved ones from the convenience of home, since they are highly elastic and conform easily to the affected body parts. For more information, please refer to the backside of the box.",
            "Multi-Functional: From wound care to being used as a bandage for burns\' dressing, our rolled gauze 4 inches offers versatile functionality. They can also be used as either mummy wraps or mummy bandages for your last-minute Halloween costume call, so enjoy your parties with easy mobility using our fine gauze."
        ]
    }'),
    (default, '{
        "name": "Protective Eye Goggles",
        "images": [
            "product8.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 27.99
        },
        "discount_price": {
        },
        "description": [
            "Polyvinyl Chloride frame",
            "Polycarbonate lens",
            "Anti Fog Lens : The essential goods safety lab glasses are made of clear, highly transparent, wear-resistant PC material. Transparent lenses with anti-fog coating technology can protect the eyes of adults and maintain a clear field of vision from the external environment.",
            "Adjustable Strap: The adjustable black belt is suitable for your head circumference. Comes with soft eye socket and nose pad, one size fits all safety googles for men and women.",
            "Soft Edge Design: Made with a soft, flexible PVC body to ensure proper fit and comfort. The wraparound side shield construction provides a perfect fit and seal."
        ]
    }'),
    (default, '{
        "name": "Isopropyl Alcohol",
        "images": [
            "product9.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 29.99
        },
        "discount_price": {
        },
        "description": [
            "Medical Grade Isopropyl Alcohol",
            "First aid to help prevent risk of infection from minor cuts, scrapes and burns",
            "No heavy metals or harmful organics",
            "Used in the production of sanitizers",
            "Less than 0.001 g/100 mL non-volatile residues"
        ]
    }'),
    (default, '{
        "name": "Barbicide",
        "images": [
            "product10.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 24.99
        },
        "discount_price": {
        },
        "description": [
            "It is an easy way for the professional groomer to disinfect comb, brushes, shears, and more",
            "Kills ringworm, HIV virus, staph, bacteria, and other pathogens",
            "Barbicide disinfectant contains a powerful rust inhibitor",
            "Concentrated liquid, 4 ounce makes one gallon of clear blue solution, a 64 ounce bottle makes 16 gallons",
            "Metals can be immersed for hours without rusting, but should be oiled afterward; measures 10-1/2-inch length by 4-1/2-inch width by 4-1/2-inch height"
        ]
    }'),
    (default, '{
        "name": "Water Purification Tablets",
        "images": [
            "product11.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 11.99
        },
        "discount_price": {
        },
        "description": [
            "Each Aquatab is 49mg with 16.88% Sodium Dichloroisocyanurate creating 2.6ppm available chlorine. When dissolved in 2 quarts of water the easy to use tablets disinfect the water for safe drinking in as little as 30 minutes. For water that requires filtering and removal of dirt particles, such as water from a stream or river, use 1 tablet for every 0.75 liters of filtered water.",
            "Protect you and your family during outdoor activities, natural disasters and emergency situations where boiling water is not an option. Be sure to read instructions before use.",
            "Aquatabs are conveniently packaged to retain freshness and start with a 5 Year Shelf Life. Each Strip of Aquatabs contains 10 individually sealed tablets.",
            "Tablets are so small that they easily fit into any pocket, pouch, purse, bag, backpack, drawer, emergency preparedness kit, disaster relief pack and more."
        ]
    }'),
    (default, '{
        "name": "Glowsticks (6 ct)",
        "images": [
            "product12.png"
        ],
        "rating": 4,
        "stock": 100,
        "price": {
            "usd": 3.99
        },
        "discount_price": {
            "usd": 1.99
        },
        "description": [
            "SAFE AND ECO-FRIENDLY: Using the most innovative industrial grade construction technique, these glow sticks are waterproof, non-flammable and have a non-toxic chemistry. This means they guarantee a long lasting and environmentally friendly option for lighting up your party.",
            "PREMIUM QUALITY: These Ultra Bright Glow Sticks are made from industrial grade construction which uses a perfect blend of premium materials to provide you Non-Toxic, waterproof and CPSIA Compliant party glow sticks that assures a lasting use of up to 12 hours, more fun and 100% safety.",
            "OUR QUALITY PROMISE: We have made these glow sticks from premium materials using industrial grade construction to provide you a distinctive party supply that lights up your special event with safety in mind. So, we are sure you will love the effect this sticks will have on your party."
        ]
    }'),
    (default, '{
        "name": "Vitafusion Vitamins",
        "images": [
            "product13.png"
        ],
        "rating": 3,
        "stock": 100,
        "price": {
            "usd": 21.99
        },
        "discount_price": {
        },
        "description": [
            "Tasty and easy to take alternative to pills",
            "Delicious natural flavors. Supports bone health",
            "Contains no gluten (wheat), milk, eggs, peanuts, or soy",
            "Just two per day provides multivitamins and minerals you may need",
            "Multi-vitamin and mineral formula in naturallly flavored gummies with up to 75 servings per bottle"
        ]
    }'),
    (default, '{
        "name": "Tylenol Extra Strength",
        "images": [
            "product14.png"
        ],
        "rating": 5,
        "stock": 100,
        "price": {
            "usd": 9.99
        },
        "discount_price": {
            "usd": 7.99
        },
        "description": [
            "Tylenol Extra Strength Caplets with 500mg of acetaminophen to provide temporary relief of minor aches and pains and help reduce fever",
            "Each extra strength caplet contains 500 mg of acetaminophen for effective, lasting pain relief, and has an excellent safety profile when used as directed",
            "Use as a fever reducer and to help provide relief of common pain symptoms including headache, backache, toothache, menstrual cramps and pain caused by the common cold",
            "This extra strength acetaminophen pain reliever can be used by adults and children who are 12 years and older",
            "From the #1 doctor recommended brand for pain relief and fever reduction, experience relief from minor aches and pains with Tylenol"
        ]
    }'),
    (default, '{
        "name": "Advil Tablets",
        "images": [
            "product15.png"
        ],
        "rating": 3,
        "stock": 100,
        "price": {
            "usd": 6.99
        },
        "discount_price": {
        },
        "description": [
            "Relieve Pain And Reduce Fever: Whether you have occasional muscle aches, backaches, minor arthritis pain, or other aches and pains, Advil stops pain at the site of inflammation so you can get relief where you need it",
            "Pain Relief: Advil Coated Tablets contain 200mg of Ibuprofen; Tough headache, minor arthritis, menstrual cramps, backache, and other pains don’t stand a chance against Advil",
            "Unbeatable Strength: Millions of people choose Advil as their medicine for powerful pain relief; Use as a fever reducer and to help alleviate common pain symptoms including headache, backache, toothache and pain caused by the common cold",
            "Safe Pain Relief: For over 35 years, millions of people choose Advil to deliver powerful pain relief from many kinds of acute pain including headache, backache and joint and minor arthritis pain",
            "Number 1 Ibuprofen Brand: Advil delivers unbeatable strength of tough pain; Add Advil to your cart today and get power over pain; This oral pain reliever can be used by adults and children who are 12 years and older"
        ]
    }'),
    (default, '{
        "name": "Forehead Thermometer",
        "images": [
            "product16.png"
        ],
        "rating": 3,
        "stock": 100,
        "price": {
            "usd": 18.99
        },
        "discount_price": {
        },
        "description": [
            "Accurate and fast: This Infrared forehead thermometer is equipped with exceptional microchip and a sensitivity sensor. Infrared senor can precisely detecting the infrared heat given off by the forehead and quickly measuring to get the reading in 1 second",
            "Engineered technology: The non contact infrared body thermometer is design to minimize the errors in the software program by following sound and light enginnering design processes, risk analysis and soft ware validation",
            "No touch forehead 1-5cm: The measuring distance between the thermometer and the forehead must be 1-5 cm. Non-contact thermometer is more convenient than standard thermometer and touch thermometer",
            "50 readings memory storages: Our thermometer can memory 50 readings to continusly track your family member\'s tempreature. Which can handle it in advance if your family members\' temperature is slightly high",
            "Multiple measurement modes: Thermometers can not only measure body temperature, but also measure the temperature of objects. It is suitable for all ages. Press and hold the set button for 3 seconds, then press the \\"memo\\" or the \\"mode\\" to switch ℃ and ℉"
        ]
    }');