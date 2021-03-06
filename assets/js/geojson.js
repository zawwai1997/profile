let regionJSON = {
  type: "FeatureCollection",
  features: [
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["93.5558", "22.446"],
      },
      properties: {
        place_name: {
          db_name: "div-chin",
          real_name: "Chin State",
          zawgyi: "ခ်င္းျပည္နယ္",
          unicode: "ချင်းပြည်နယ်",
        },
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        townships: ["tiddim"],
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0889", "21.9615"],
      },
      properties: {
        place_name: {
          db_name: "div-mandalay",
          real_name: "Mandalay Region",
          zawgyi: "မႏၲေလးတိုင္းေဒသႀကီး",
          unicode: "မန္တလေးတိုင်းဒေသကြီး",
        },
        pui: "89",
        suspected: "3",
        lab_negative: "100",
        lab_pending: "10",
        die: "0",
        recovered: "0",
        lab_confirmed: "2",
        total_cases: 204,
        visited_places: [
          "Mandalay City Hotel",
          "A Little Bit of Mandalay(Dinner)",
          "Shwe Kyaung",
          "Kyaut Sane Market",
          "Mahar Myat Muni Pagoda",
          "Aung Nan Shop",
          "Innwa",
          "U Bein Bridge",
        ],
        townships: [
          "myittha",
          "m-chanayethazan",
          "m-chanmyathazi",
          "patheingyi",
          "meiktila",
          "wundwin",
          "nyaung-u",
          "kyaukpadaung",
          "mogoke",
          "pyinoolwin",
          "pyawbwe",
          "yamethin",
          "pyinmana",
          "taungtha",
        ],
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1538", "16.9101"],
      },
      properties: {
        place_name: {
          db_name: "div-yangon",
          real_name: "Yangon Region",
          zawgyi: "ရန္ကုန္တိုင္းေဒသႀကီး",
          unicode: "ရန်ကုန်တိုင်းဒေသကြီး",
        },
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "1",
        recovered: "0",
        lab_confirmed: "11",
        total_cases: 12,
        visited_places: [],
        townships: [
          "y-northokkalapa",
          "y-southokkalapa",
          "y-insein",
          "y-mingaladon",
          "y-kyeemyindaing",
          "y-lanmadaw",
        ],
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["97.752", "22.9626"],
      },
      properties: {
        place_name: {
          db_name: "div-nshan",
          real_name: "North Shan State",
          zawgyi: "ရွမ္းျပည္နယ္ေျမာက္ပိုင္း",
          unicode: "ရှမ်းပြည်နယ်မြောက်ပိုင်း",
        },
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        townships: ["kyaukme"],
      },
    },
  ],
};

let townshipJSON = {
  type: "FeatureCollection",
  features: [
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1316", "21.4269"],
      },
      properties: {
        place_name: {
          db_name: "myittha",
          real_name: "Myittha",
          zawgyi: "???????",
          unicode: "???????",
        },
        description: "",
        pui: "4",
        suspected: "0",
        lab_negative: "27",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 31,
        visited_places: [],
        //hospitals: ["Myittha Township Hospital", "Mongmao Station Hospital *"],
        region: "div-mandalay",
        district: "ky-kyaukse",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0904", "21.9775"],
      },
      properties: {
        place_name: {
          db_name: "m-chanayethazan",
          real_name: "Chan Aye Tha Zan",
          zawgyi: "????????????",
          unicode: "????????????",
        },
        description: "",
        pui: "37",
        suspected: "0",
        lab_negative: "33",
        lab_pending: "4",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 74,
        visited_places: [
          "Mandalay City Hotel",
          "A Little Bit of Mandalay(Dinner)",
        ],
        hospitals: [
          "Children Specialist Hospital",
          "Mandalay General Hospital",
        ],
        region: "div-mandalay",
        district: "ky-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0987", "21.9438"],
      },
      properties: {
        place_name: {
          db_name: "m-chanmyathazi",
          real_name: "Chan Mya Tha Zi",
          zawgyi: "????????????",
          unicode: "????????????",
        },
        description: "",
        pui: "26",
        suspected: "0",
        lab_negative: "25",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 52,
        visited_places: ["Mahar Myat Muni Pagoda", "Aung Nan Shop"],
        hospitals: ["Kandaw Nadi Hospital"],
        region: "div-mandalay",
        district: "ky-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1723", "21.9879"],
      },
      properties: {
        place_name: {
          db_name: "patheingyi",
          real_name: "Patheingyi",
          zawgyi: "??????????",
          unicode: "??????????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 3,
        visited_places: [],
        hospitals: ["500 Beded Children Hospital*"],
        region: "div-mandalay",
        district: "ky-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.8639", "20.8838"],
      },
      properties: {
        place_name: {
          db_name: "meiktila",
          real_name: "Meiktila",
          zawgyi: "???????",
          unicode: "????????",
        },
        description: "",
        pui: "5",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "4",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 10,
        visited_places: [],
        hospitals: ["Meiktila General Hospital", "Yin Taw Station Hospital*"],
        region: "div-mandalay",
        district: "ky-meiktila",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0305", "21.0942"],
      },
      properties: {
        place_name: {
          db_name: "wundwin",
          real_name: "Wundwin",
          zawgyi: "?????????",
          unicode: "?????????",
        },
        description: "",
        pui: "1",
        suspected: "2",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 3,
        visited_places: [],
        hospitals: ["Wundwin Township Hospital"],
        region: "div-mandalay",
        district: "ky-meiktila",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["94.9165", "21.1767"],
      },
      properties: {
        place_name: {
          db_name: "nyaung-u",
          real_name: "Nyaung-U",
          zawgyi: "???????",
          unicode: "???????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        visited_places: [],
        hospitals: ["Nyaung-U General Hospital"],
        region: "div-mandalay",
        district: "ky-nyaung-u",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.1285", "20.8423"],
      },
      properties: {
        place_name: {
          db_name: "kyaukpadaung",
          real_name: "Kyaukpadaung",
          zawgyi: "????????????????",
          unicode: "????????????????",
        },
        description: "",
        pui: "4",
        suspected: "1",
        lab_negative: "2",
        lab_pending: "2",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 9,
        visited_places: [],
        hospitals: ["Popa Station Hospital", "Kyaukpadaung Township Hospital"],
        region: "div-mandalay",
        district: "ky-nyaung-u",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.5041", "22.9196"],
      },
      properties: {
        place_name: {
          db_name: "mogoke",
          real_name: "Mogoke",
          zawgyi: "????????",
          unicode: "????????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        visited_places: [],
        hospitals: ["Mogok Township  Hospital"],
        region: "div-mandalay",
        district: "ky-pyinoolwin",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.4664", "22.0297"],
      },
      properties: {
        place_name: {
          db_name: "pyinoolwin",
          real_name: "Pyinoolwin",
          zawgyi: "??????????",
          unicode: "??????????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        visited_places: [],
        hospitals: ["Pyinoolwin General Hospital"],
        region: "div-mandalay",
        district: "ky-pyinoolwin",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0501", "20.5958"],
      },
      properties: {
        place_name: {
          db_name: "pyawbwe",
          real_name: "Pyawbwe",
          zawgyi: "?????????",
          unicode: "?????????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        visited_places: [],
        hospitals: ["Yan Aung Station Hospital*"],
        region: "div-mandalay",
        district: "ky-yamethin",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1368", "20.4287"],
      },
      properties: {
        place_name: {
          db_name: "yamethin",
          real_name: "Yamethin",
          zawgyi: "?????????",
          unicode: "?????????",
        },
        description: "",
        pui: "3",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 5,
        visited_places: [],
        hospitals: [
          "Thit Son Gyi Station Hospital*",
          "Yamethin General Hospital",
        ],
        region: "div-mandalay",
        district: "ky-yamethin",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["93.6545", "23.376"],
      },
      properties: {
        place_name: {
          db_name: "tiddim",
          real_name: "Tiddim",
          zawgyi: "???????",
          unicode: "???????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["Tedim General Hospital"],
        region: "div-chin",
        district: "ky-falam",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["97.0306", "22.5403"],
      },
      properties: {
        place_name: {
          db_name: "kyaukme",
          real_name: "Kyaukme",
          zawgyi: "????????",
          unicode: "????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["Kyaukme Hospital"],
        region: "div-nshan",
        district: "ky-kyaukme",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.168", "16.9208"],
      },
      properties: {
        place_name: {
          db_name: "y-northokkalapa",
          real_name: "North Okkalapa",
          zawgyi: "?????????????",
          unicode: "??????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "4",
        total_cases: 4,
        visited_places: [],
        hospitals: ["Wai Bar Gi Hospital", "North Okkalapa General Hospital"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1801", "16.8518"],
      },
      properties: {
        place_name: {
          db_name: "y-southokkalapa",
          real_name: "South Okkalapa",
          zawgyi: "???????????",
          unicode: "????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "3",
        total_cases: 3,
        visited_places: [],
        hospitals: ["Yangon Hotel"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0999", "16.9043"],
      },
      properties: {
        place_name: {
          db_name: "y-insein",
          real_name: "Insein",
          zawgyi: "????????",
          unicode: "????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["Insein General Hospital"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.141", "16.9973"],
      },
      properties: {
        place_name: {
          db_name: "y-mingaladon",
          real_name: "Mingaladon",
          zawgyi: "????????",
          unicode: "??????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["Pale Myo Thit Hospital"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1181", "16.8066"],
      },
      properties: {
        place_name: {
          db_name: "y-kyeemyindaing",
          real_name: "Kyeemyindaing",
          zawgyi: "??????????????",
          unicode: "??????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["West Yangon General Hospital"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1406", "16.7782"],
      },
      properties: {
        place_name: {
          db_name: "y-lanmadaw",
          real_name: "Lanmadaw",
          zawgyi: "?????????",
          unicode: "?????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "1",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 2,
        visited_places: [],
        hospitals: ["Yangon General Hospital"],
        region: "div-yangon",
        district: "ky-eyangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.2", "19.7415"],
      },
      properties: {
        place_name: {
          db_name: "pyinmana",
          real_name: "Pyinmana",
          zawgyi: "?????????",
          unicode: "?????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        visited_places: [],
        hospitals: ["1000 bedded Naypyitaw General Hospital"],
        region: "div-mandalay",
        district: "ky-naypyitaw",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.4408", "21.2864"],
      },
      properties: {
        place_name: {
          db_name: "taungtha",
          real_name: "Taungtha",
          zawgyi: "???????",
          unicode: "???????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        visited_places: [],
        hospitals: ["Taungtha Township Hospital"],
        region: "div-mandalay",
        district: "ky-myingyan",
      },
    },
  ],
};

let hospitalJSON = {
  type: "FeatureCollection",
  features: [
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["97.0319", "22.5237"],
      },
      properties: {
        place_name: {
          db_name: "Kyaukme Hospital",
          real_name: "Kyaukme Hospital",
          zawgyi: "???????? ??????",
          unicode: "???????? ??????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "kyaukme",
        district: "ky-kyaukme",
        region: "div-nshan",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.1206", "20.834"],
      },
      properties: {
        place_name: {
          db_name: "Kyaukpadaung Township Hospital",
          real_name: "Kyaukpadaung Township Hospital",
          zawgyi: "???????????????????????? ??????",
          unicode: "???????????????????????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "1",
        lab_negative: "0",
        lab_pending: "2",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 5,
        township: "kyaukpadaung",
        district: "ky-nyaung-u",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.1985", "20.9361"],
      },
      properties: {
        place_name: {
          db_name: "Popa Station Hospital",
          real_name: "Popa Station Hospital",
          zawgyi: "???????????? ??????",
          unicode: "????????????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        township: "kyaukpadaung",
        district: "ky-nyaung-u",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0919", "21.9774"],
      },
      properties: {
        place_name: {
          db_name: "Mandalay General Hospital",
          real_name: "Mandalay General Hospital",
          zawgyi: "?????? ?????????????????",
          unicode: "??????? ?????????????????",
        },
        description: "",
        pui: "36",
        suspected: "0",
        lab_negative: "32",
        lab_pending: "4",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 72,
        township: "m-chanayethazan",
        district: "ky-mandalay",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.105", "21.9796"],
      },
      properties: {
        place_name: {
          db_name: "Children Specialist Hospital",
          real_name: "Children Specialist Hospital",
          zawgyi: "?????????? ??????(??????)",
          unicode: "?????????? ??????(???????)",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        township: "m-chanayethazan",
        district: "ky-mandalay",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1123", "21.9453"],
      },
      properties: {
        place_name: {
          db_name: "Kandaw Nadi Hospital",
          real_name: "Kandaw Nadi Hospital",
          zawgyi: "?????????? ??????",
          unicode: "?????????? ??????",
        },
        description: "",
        pui: "26",
        suspected: "0",
        lab_negative: "25",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 52,
        township: "m-chanmyathazi",
        district: "ky-mandalay",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.9387", "20.7177"],
      },
      properties: {
        place_name: {
          db_name: "Yin Taw Station Hospital*",
          real_name: "Yin Taw Station Hospital*",
          zawgyi: "?????? ??????",
          unicode: "?????? ??????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "4",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 5,
        township: "meiktila",
        district: "ky-meiktila",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.8448", "20.8766"],
      },
      properties: {
        place_name: {
          db_name: "Meiktila General Hospital",
          real_name: "Meiktila General Hospital",
          zawgyi: "??????? ????????????????????????",
          unicode: "???????? ????????????????????????",
        },
        description: "",
        pui: "4",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 5,
        township: "meiktila",
        district: "ky-meiktila",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.4977", "22.9186"],
      },
      properties: {
        place_name: {
          db_name: "Mogok Township  Hospital",
          real_name: "Mogok Township  Hospital",
          zawgyi: "???????? ???????? ??????",
          unicode: "???????? ???????? ??????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        township: "mogoke",
        district: "ky-pyinoolwin",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1294", "21.4226"],
      },
      properties: {
        place_name: {
          db_name: "Myittha Township Hospital",
          real_name: "Myittha Township Hospital",
          zawgyi: "??????? ???????? ??????",
          unicode: "??????? ???????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "25",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 27,
        township: "myittha",
        district: "ky-kyaukse",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.2093", "21.313"],
      },
      properties: {
        place_name: {
          db_name: "Mongmao Station Hospital *",
          real_name: "Mongmao Station Hospital *",
          zawgyi: "????????? ??????",
          unicode: "????????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        township: "myittha",
        district: "ky-kyaukse",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["94.908", "21.1901"],
      },
      properties: {
        place_name: {
          db_name: "Nyaung-U General Hospital",
          real_name: "Nyaung-U General Hospital",
          zawgyi: "???????? ?????????????????",
          unicode: "???????? ?????????????????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        township: "nyaung-u",
        district: "ky-nyaung-u",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.16", "22"],
      },
      properties: {
        place_name: {
          db_name: "500 Beded Children Hospital*",
          real_name: "500 Beded Children Hospital*",
          zawgyi: "????? ?????? ??????????(??????)",
          unicode: "????? ?????? ??????????(???????)",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 3,
        township: "patheingyi",
        district: "ky-mandalay",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.9687", "20.5467"],
      },
      properties: {
        place_name: {
          db_name: "Yan Aung Station Hospital*",
          real_name: "Yan Aung Station Hospital*",
          zawgyi: "???????? ??????",
          unicode: "???????? ??????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        township: "pyawbwe",
        district: "ky-yamethin",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1008", "19.7428"],
      },
      properties: {
        place_name: {
          db_name: "1000 bedded Naypyitaw General Hospital",
          real_name: "1000 bedded Naypyitaw General Hospital",
          zawgyi: "?????????? ?????(????)??? ??????",
          unicode: "?????????? ?????(????)??? ??????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "pyinmana",
        district: "ky-naypyitaw",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.4653", "22.0223"],
      },
      properties: {
        place_name: {
          db_name: "Pyinoolwin General Hospital",
          real_name: "Pyinoolwin General Hospital",
          zawgyi: "??????????? ?????????????????",
          unicode: "??????????? ?????????????????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        township: "pyinoolwin",
        district: "ky-pyinoolwin",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.4494", "21.2675"],
      },
      properties: {
        place_name: {
          db_name: "Taungtha Township Hospital",
          real_name: "Taungtha Township Hospital",
          zawgyi: "??????? ???????? ??????",
          unicode: "??????? ???????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "2",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 4,
        township: "taungtha",
        district: "ky-myingyan",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["93.6508", "23.3689"],
      },
      properties: {
        place_name: {
          db_name: "Tedim General Hospital",
          real_name: "Tedim General Hospital",
          zawgyi: "??????? ?????????????????",
          unicode: "??????? ?????????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "tiddim",
        district: "ky-falam",
        region: "div-chin",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.0332", "21.094"],
      },
      properties: {
        place_name: {
          db_name: "Wundwin Township Hospital",
          real_name: "Wundwin Township Hospital",
          zawgyi: "????????? ???????? ??????",
          unicode: "????????? ???????? ??????",
        },
        description: "",
        pui: "1",
        suspected: "2",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 3,
        township: "wundwin",
        district: "ky-meiktila",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1051", "16.8921"],
      },
      properties: {
        place_name: {
          db_name: "Insein General Hospital",
          real_name: "Insein General Hospital",
          zawgyi: "???????? ?????????????????",
          unicode: "???????? ?????????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "y-insein",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1255", "16.7959"],
      },
      properties: {
        place_name: {
          db_name: "West Yangon General Hospital",
          real_name: "West Yangon General Hospital",
          zawgyi: "??????????????????? ??????????",
          unicode: "??????????????????? ??????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "y-kyeemyindaing",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.149", "16.7791"],
      },
      properties: {
        place_name: {
          db_name: "Yangon General Hospital",
          real_name: "Yangon General Hospital",
          zawgyi: "??????? ?????????????????",
          unicode: "??????? ?????????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "1",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 2,
        township: "y-lanmadaw",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1434", "16.99"],
      },
      properties: {
        place_name: {
          db_name: "Pale Myo Thit Hospital",
          real_name: "Pale Myo Thit Hospital",
          zawgyi: "???????????? ??????",
          unicode: "???????????? ??????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "y-mingaladon",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1565", "16.9205"],
      },
      properties: {
        place_name: {
          db_name: "Wai Bar Gi Hospital",
          real_name: "Wai Bar Gi Hospital",
          zawgyi: "?????? ??????",
          unicode: "?????? ??????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "3",
        total_cases: 3,
        township: "y-northokkalapa",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1581", "16.9008"],
      },
      properties: {
        place_name: {
          db_name: "North Okkalapa General Hospital",
          real_name: "North Okkalapa General Hospital",
          zawgyi: "???????????? ?????????????????",
          unicode: "????????????? ?????????????????",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "1",
        total_cases: 1,
        township: "y-northokkalapa",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1735", "16.8408"],
      },
      properties: {
        place_name: {
          db_name: "Yangon Hotel",
          real_name: "Yangon Hotel",
          zawgyi: "",
          unicode: "",
        },
        description: "",
        pui: "0",
        suspected: "0",
        lab_negative: "0",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "3",
        total_cases: 3,
        township: "y-southokkalapa",
        district: "ky-eyangon",
        region: "div-yangon",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["95.8615", "20.4568"],
      },
      properties: {
        place_name: {
          db_name: "Thit Son Gyi Station Hospital*",
          real_name: "Thit Son Gyi Station Hospital*",
          zawgyi: "????????????????????????",
          unicode: "?????????????????? ??????",
        },
        description: "",
        pui: "1",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 2,
        township: "yamethin",
        district: "ky-yamethin",
        region: "div-mandalay",
      },
    },
    {
      type: "Feature",
      geometry: {
        type: "Point",
        coordinates: ["96.1357", "20.4366"],
      },
      properties: {
        place_name: {
          db_name: "Yamethin General Hospital",
          real_name: "Yamethin General Hospital",
          zawgyi: "????????????????? ??????",
          unicode: "????????????????? ??????",
        },
        description: "",
        pui: "2",
        suspected: "0",
        lab_negative: "1",
        lab_pending: "0",
        die: "0",
        recovered: "0",
        lab_confirmed: "0",
        total_cases: 3,
        township: "yamethin",
        district: "ky-yamethin",
        region: "div-mandalay",
      },
    },
  ],
};
