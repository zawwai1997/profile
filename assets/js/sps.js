window.onload = function() {
        var eventsHandler;

        eventsHandler = {
          haltEventListeners: ['touchstart', 'touchend', 'touchmove', 'touchleave', 'touchcancel']
        , init: function(options) {
            var instance = options.instance
              , initialScale = 1
              , pannedX = 0
              , pannedY = 0

            // Init Hammer
            // Listen only for pointer and touch events
            this.hammer = Hammer(options.svgElement, {
              inputClass: Hammer.SUPPORT_POINTER_EVENTS ? Hammer.PointerEventInput : Hammer.TouchInput
            })

            // Enable pinch
            this.hammer.get('pinch').set({enable: true})

            // Handle double tap
            this.hammer.on('doubletap', function(ev){
              instance.zoomIn()
            })

            // Handle pan
            this.hammer.on('panstart panmove', function(ev){
              // On pan start reset panned variables
              if (ev.type === 'panstart') {
                pannedX = 0
                pannedY = 0
              }

              // Pan only the difference
              instance.panBy({x: ev.deltaX - pannedX, y: ev.deltaY - pannedY})
              pannedX = ev.deltaX
              pannedY = ev.deltaY
            })

            // Handle pinch
            this.hammer.on('pinchstart pinchmove', function(ev){
              // On pinch start remember initial zoom
              if (ev.type === 'pinchstart') {
                initialScale = instance.getZoom()
                instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
              }

              instance.zoomAtPoint(initialScale * ev.scale, {x: ev.center.x, y: ev.center.y})
            })

            // Prevent moving the page on some devices when panning over SVG
            options.svgElement.addEventListener('touchmove', function(e){ e.preventDefault(); });
          }

        , destroy: function(){
            this.hammer.destroy()
          }
        }





        var cv_pos = [
          "#ea6861",
          "#e8524a",
          "#e53d34",
          "#e2271d",
          "#cb231a",
          "#b51f17",
          "#9e1b15",
          "#871712",
          "#71140f",
          "#5a100c"
        ];

        var cv_pos_sus = [
            "#ffd480",
            "#ffcc66",
            "#ffc34d",
            "#ffbb33",
            "#ffb31a",
            "#ffaa00",
            "#e69900",
            "#cc8800",
            "#b37700",
            "#996600",
        ]

        var cv_pos2 = [
          "fce9e8",
          "f9d4d2",
          "f6bebb",
          "f3a9a5",
          "f0938e",
          "ed7d78",
          "ea6861",
          "e8524a",
          "e74c44",
          "e53d34"
        ];

        var cv_pos_sus2 = [
            "ffd480",
            "ffcc66",
            "ffc34d",
            "ffbb33",
            "ffb31a",
            "ffaa00",
            "e69900",
            "cc8800",
            "b37700",
            "cc96600",
        ]

        var territories = [
          {
              'div': 'div-kachin',
              'data':
              [
                  {
                      'ky': 'ky-puta-o',
                      'data':
                      {
                          'ts': ['nogmung', 'kawnglanghpu', 'puta-o', 'machanbaw', 'sumprabum']
                      }
                  },
                  {
                      'ky': 'ky-myitkyina',
                      'data':
                      {
                          'ts': ['tanai', 'injangyang', 'tsawlaw', 'chipwi', 'myitkyina', 'waingmaw']
                      }
                  },
                  {
                      'ky': 'ky-mohnyin',
                      'data':
                      {
                          'ts': ['hpakan', 'mohnyin', 'mogaung']
                      }
                  },
                  {
                      'ky': 'ky-bhamo',
                      'data':
                      {
                          'ts': ['momauk', 'shwegu', 'bhamo', 'mansi']
                      }
                  },
              ],
          },
          {
              'div': 'div-sagaing',
              'data':
              [
                  {
                      'ky': 'ky-hkamti',
                      'data':
                      {
                          'ts': ['nanyun', 'lahe', 'hkamti', 'layshi', 'homalin']
                      }
                  },
                  {
                      'ky': 'ky-mawlaik',
                      'data':
                      {
                          'ts': ['tamu', 'paungbyin', 'mawlaik']
                      }
                  },
                  {
                      'ky': 'ky-katha',
                      'data':
                      {
                          'ts': ['banmauk', 'indaw', 'katha', 'tigyaing', 'pinlebu', 'wuntho', 'kawlin']
                      }
                  },
                  {
                      'ky': 'ky-kanbalu',
                      'data':
                      {
                          'ts': ['kyunhla', 'kanbalu']
                      }
                  },
                  {
                      'ky': 'ky-kale',
                      'data':
                      {
                          'ts': ['kalewa', 'mingin', 'kale']
                      }
                  },
                  {
                      'ky': 'ky-shwebo',
                      'data':
                      {
                          'ts': ['taze', 'ye-u', 'khin-u', 'shwebo', 'tabayin', 'wetlet']
                      }
                  },
                  {
                      'ky': 'ky-yinmabin',
                      'data':
                      {
                          'ts': ['kani', 'yinmabin', 'pale', 'salingyi']
                      }
                  },
                  {
                      'ky': 'ky-monywa',
                      'data':
                      {
                          'ts': ['budalin', 'ayadaw', 'monywa', 'chaung-u']
                      }
                  },
                  {
                      'ky': 'ky-sagaing',
                      'data':
                      {
                          'ts': ['sagaing', 'myinmu', 'myaung']
                      }
                  },
              ],
          },
          {
              'div' : 'div-tanintharyi',
              'data' :
              [
                  {
                      'ky' : 'ky-dawei',
                      'data' :
                      {
                          'ts' : ['dawei', 'launglon', 'thayetchaung', 'yebyu']
                      },
                  },
                  {
                      'ky' : 'ky-kawthoung',
                      'data' :
                      {
                          'ts' : ['bokpyin', 'kawthoung']
                      },
                  },
                  {
                      'ky' : 'ky-myeik',
                      'data' :
                      {
                          'ts' : ['kyunsu', 'myeik', 'palaw', 'tanintharyi']
                      },
                  },
              ],
          },
          {
              'div' : 'div-magway',
              'data' :
              [
                  {
                      'ky' : 'ky-gangaw',
                      'data' :
                      {
                          'ts' : ['gangaw', 'saw', 'tilin']
                      },
                  },
                  {
                      'ky' : 'ky-magway',
                      'data' :
                      {
                          'ts' : ['chauk', 'magway', 'myothit', 'natmauk', 'taungdwingyi', 'yenangyaung']
                      },
                  },
                  {
                      'ky' : 'ky-minbu',
                      'data' :
                      {
                          'ts' : ['minbu', 'ngape', 'pwintbyu', 'salin', 'sidoktaya']
                      },
                  },
                  {
                      'ky' : 'ky-pakokku',
                      'data' :
                      {
                          'ts' : ['myaing', 'pakokku', 'pauk', 'seikphyu', 'yesagyo']
                      },
                  },
                  {
                      'ky' : 'ky-thayet',
                      'data' :
                      {
                          'ts' : ['aunglan', 'kamma', 'mindon', 'minhla', 'sinbaungwe', 'thayet']
                      },
                  },
              ],
          },
          {
              'div' : 'div-mandalay',
              'data' :
              [
                  {
                      'ky' : 'ky-kyaukse',
                      'data' :
                      {
                          'ts' : ['kyaukse', 'myittha', 'sintgaing', 'tada-u']
                      },
                  },
                  {
                      'ky' : 'ky-mandalay',
                      'data' :
                      {
                          'ts' : ['amarapura', 'm-aungmyaythazan', 'm-chanayethazan', 'm-chanmyathazi', 'm-mahaaungmyay', 'patheingyi', 'm-pyigyitagon']
                      },
                  },
                  {
                      'ky' : 'ky-meiktila',
                      'data' :
                      {
                          'ts' : ['mahlaing', 'meiktila', 'thazi', 'wundwin']
                      },
                  },
                  {
                      'ky' : 'ky-myingyan',
                      'data' :
                      {
                          'ts' : ['myingyan', 'natogyi', 'ngazun', 'taungtha']
                      },
                  },
                  {
                      'ky' : 'ky-nyaung-u',
                      'data' :
                      {
                          'ts' : ['nyaung-u', 'kyaukpadaung']
                      },
                  },
                  {
                      'ky' : 'ky-pyinoolwin',
                      'data' :
                      {
                          'ts' : ['madaya', 'mogoke', 'pyinoolwin', 'singu', 'thabeikkyin']
                      },
                  },
                  {
                      'ky' : 'ky-yamethin',
                      'data' :
                      {
                          'ts' : ['pyawbwe', 'yamethin']
                      },
                  },
                  {
                      'ky' : 'ky-naypyitaw',
                      'data' :
                      {
                          'ts' : ['lewe', 'pyinmana', 'tatkon']
                      },
                  },
              ],
          },
          {
              'div' : 'div-ayeyarwaddy',
              'data' :
              [
                  {
                      'ky' : 'ky-hinthada',
                      'data' :
                      {
                          'ts' : ['hinthada', 'lemyethna', 'zalun', 'ingapu', 'kyangin', 'myanaung']
                      },
                  },
                  {
                      'ky' : 'ky-labutta',
                      'data' :
                      {
                          'ts' : ['labutta', 'mawlamyinegyun']
                      },
                  },
                  {
                      'ky' : 'ky-maubin',
                      'data' :
                      {
                          'ts' : ['danubyu', 'maubin', 'nyaungdon', 'pantanaw']
                      },
                  },
                  {
                      'ky' : 'ky-myaungmya',
                      'data' :
                      {
                          'ts' : ['einme', 'myaungmya', 'wakema']
                      },
                  },
                  {
                      'ky' : 'ky-pathein',
                      'data' :
                      {
                          'ts' : ['kangyidaunt', 'ngapudaw', 'pathein', 'thabaung', 'kyaunggon', 'kyonpyaw', 'yegyi']
                      },
                  },
                  {
                      'ky' : 'ky-pyapon',
                      'data' :
                      {
                          'ts' : ['bogale', 'dedaye', 'kyaiklat', 'pyapon']
                      },
                  },
              ],
          },
          {
              'div' : 'div-ebago',
              'data' :
              [
                  {
                      'ky' : 'ky-bago',
                      'data' :
                      {
                          'ts' : ['bago', 'daik-u', 'kawa', 'tanatpin', 'waw', 'kyauktaga', 'nyaunglebin', 'shwegyin']
                      },
                  },
                  {
                      'ky' : 'ky-taungoo',
                      'data' :
                      {
                          'ts' : ['kyaukkyi', 'oktwin', 'phyu', 'tantabin', 'taungoo', 'yedashe']
                      },
                  },

              ],
          },
          {
              'div' : 'div-wbago',
              'data' :
              [
                  {
                      'ky' : 'ky-pyay',
                      'data' :
                      {
                          'ts' : ['padaung', 'paukkaung', 'paungde', 'pyay', 'shwedaung', 'thegon']
                      },
                  },
                  {
                      'ky' : 'ky-thayarwady',
                      'data' :
                      {
                          'ts' : ['gyobingauk', 'letpadan', 'minhla-2', 'monyo', 'okpho', 'thayarwady', 'nattalin', 'zigon']
                      },
                  },
              ],
          },
          {
              'div' : 'div-chin',
              'data' :
              [
                  {
                      'ky' : 'ky-falam',
                      'data' :
                      {
                          'ts' : ['falam', 'tiddim', 'tonzang']
                      },
                  },
                  {
                      'ky' : 'ky-hakha',
                      'data' :
                      {
                          'ts' : ['hakha', 'htantlang']
                      },
                  },
                  {
                      'ky' : 'ky-mindat',
                      'data' :
                      {
                          'ts' : ['mindat', 'kanpetlet', 'madupi', 'paletwa']
                      },
                  },
              ],
          },
          {
              'div' : 'div-kayar',
              'data' :
              [
                  {
                      'ky' : 'ky-bawlakhe',
                      'data' :
                      {
                          'ts' : ['bawlakhe', 'hpasaung', 'mese']
                      },
                  },
                  {
                      'ky' : 'ky-loikaw',
                      'data' :
                      {
                          'ts' : ['demoso', 'hpruso', 'loikaw', 'shadaw']
                      },
                  },
              ],
          },
          {
              'div' : 'div-kayin',
              'data' :
              [
                  {
                      'ky' : 'ky-hpa-an',
                      'data' :
                      {
                          'ts' : ['hlaingbwe', 'hpa-an', 'thandaung']
                      },
                  },
                  {
                      'ky' : 'ky-hpapun',
                      'data' :
                      {
                          'ts' : ['hpapun']
                      },
                  },
                  {
                      'ky' : 'ky-kawkareik',
                      'data' :
                      {
                          'ts' : ['kawkareik', 'kyainseikgyi',]
                      },
                  },
                  {
                      'ky' : 'ky-myawaddy',
                      'data' :
                      {
                          'ts' : ['myawaddy']
                      },
                  },
              ],
          },
          {
              'div' : 'div-mon',
              'data' :
              [
                  {
                      'ky' : 'ky-mawlamyine',
                      'data' :
                      {
                          'ts' : ['mawlamyine', 'chaungzon', 'kyaikmaraw', 'mudon', 'thanbyuzayat', 'ye']
                      },
                  },
                  {
                      'ky' : 'ky-thaton',
                      'data' :
                      {
                          'ts' : ['bilin', 'thaton', 'kyaikto', 'paung']
                      },
                  },
              ],
          },
          {
              'div' : 'div-rakhine',
              'data' :
              [
                  {
                      'ky' : 'ky-kyaukpyu',
                      'data' :
                      {
                          'ts' : ['ann', 'kyaukpyu', 'munaung', 'ramree']
                      },
                  },
                  {
                      'ky' : 'ky-maungdaw',
                      'data' :
                      {
                          'ts' : ['maungdaw', 'buthidaung']
                      },
                  },
                  {
                      'ky' : 'ky-sittwe',
                      'data' :
                      {
                          'ts' : ['pauktaw', 'sittwe', 'ponnagyun', 'rathedaung']
                      },
                  },
                  {
                      'ky' : 'ky-thandwe',
                      'data' :
                      {
                          'ts' : ['gwa', 'thandwe', 'toungup']
                      },
                  },
                  {
                      'ky' : 'ky-mrauk-u',
                      'data' :
                      {
                          'ts' : ['maruk-u', 'kyauktaw', 'minbya', 'myebon']
                      },
                  },
              ],
          },
          {
              'div' : 'div-yangon',
              'data' :
              [
                  {
                      'ky' : 'ky-eyangon',
                      'data' :
                      {
                          'ts' : ['y-botahtaung', 'y-pazundaung', 'y-northokkalapa', 'y-dawbon', 'y-mingalartaungnyunt', 'y-yankin', 'y-thaketa', 'y-southokkalapa', 'y-tamwe', 'y-thingangkuun', 'y-dagonmyothitea', 'y-dagonmyothitno', 'y-dagonmyothitse', 'y-dagonmyothitso']
                      },
                  },
                  {
                      'ky' : 'ky-nyangon',
                      'data' :
                      {
                          'ts' : ['y-hlaingtharya', 'y-insein', 'y-mingaladon', 'y-shwepyithar', 'hlegu', 'htantabin', 'taikkyi', 'hmawbi']
                      },
                  },
                  {
                      'ky' : 'ky-syangon',
                      'data' :
                      {
                          'ts' : ['y-dala', 'y-seikgyikanaungto', 'y-cocokyun', 'kawhmu', 'kayan', 'kungyangon', 'kyauktan', 'thanlyin', 'thongwa', 'twantay']
                      },
                  },
                  {
                      'ky' : 'ky-wyangon',
                      'data' :
                      {
                          'ts' : ['y-ahlone', 'y-bahan', 'y-dagon', 'y-kyeemyindaing', 'y-lanmadaw', 'y-latha', 'y-pabedan', 'y-sanchaung', 'y-seikkan', 'y-hlaing', 'y-kamaryut', 'y-mayangone']
                      },
                  },
              ],
          },
          {
              'div' : 'div-eshan',
              'data' :
              [
                  {
                      'ky' : 'ky-kengtung',
                      'data' :
                      {
                          'ts' : ['kengtung', 'mongkhet', 'mongla', 'mongyang']
                      },
                  },
                  {
                      'ky' : 'ky-monghpyak',
                      'data' :
                      {
                          'ts' : ['monghpyak', 'mongyawng']
                      },
                  },
                  {
                      'ky' : 'ky-monghsat',
                      'data' :
                      {
                          'ts' : ['monghsat', 'mongping', 'mongton']
                      },
                  },
                  {
                      'ky' : 'ky-tachileik',
                      'data' :
                      {
                          'ts' : ['tachileik']
                      },
                  },
              ],
          },
          {
              'div' : 'div-nshan',
              'data' :
              [
                  {
                      'ky' : 'ky-kunlong',
                      'data' :
                      {
                          'ts' : ['kunlong', 'laukkaing', 'konkyan']
                      },
                  },
                  {
                      'ky' : 'ky-kyaukme',
                      'data' :
                      {
                          'ts' : ['hsipaw', 'kyaukme', 'namtu', 'nawnghkio', 'mabein', 'namhsan', 'mongmit']
                      },
                  },
                  {
                      'ky' : 'ky-lashio',
                      'data' :
                      {
                          'ts' : ['hseni', 'lashio', 'mongyai', 'tangyan']
                      },
                  },
                  {
                      'ky' : 'ky-muse',
                      'data' :
                      {
                          'ts' : ['kutkai', 'muse', 'nanhkan', 'manton']
                      },
                  },
                  {
                      'ky' : 'ky-hopang',
                      'data' :
                      {
                          'ts' : ['hopang', 'mongmao', 'pangwaun']
                      },
                  },
                  {
                      'ky' : 'ky-matman',
                      'data' :
                      {
                          'ts' : ['matman', 'pangsang', 'namphan']
                      },
                  },
              ],
          },
          {
              'div' : 'div-sshan',
              'data' :
              [
                  {
                      'ky' : 'ky-langkho',
                      'data' :
                      {
                          'ts' : ['mawkmai', 'mongnai', 'langkho', 'mongpan']
                      },
                  },
                  {
                      'ky' : 'ky-loilen',
                      'data' :
                      {
                          'ts' : ['loilen', 'kunhing', 'kyethi', 'laihka', 'monghsu', 'mongkaung','nansang']
                      },
                  },
                  {
                      'ky' : 'ky-taunggyi',
                      'data' :
                      {
                          'ts' : ['hopong', 'hsihseng', 'kalaw', 'lawksawk', 'nyaungshwe', 'pekon', 'pindaya', 'pinlaung', 'taunggyi', 'ywangan']
                      },
                  },
              ],
          },
        ];


        var townships = [
            "thanatpin",
            "bogale",
            "danubyu",
            "dedaye",
            "einme",
            "hinthada",
            "ingapu",
            "kangyidaunt",
            "kyaiklat",
            "kyangin",
            "kyaunggon",
            "kyonpyaw",
            "labutta",
            "lemyethna",
            "maubin",
            "mawlamyinegyun",
            "myanaung",
            "myaungmya",
            "ngapudaw",
            "nyaungdon",
            "pantanaw",
            "pathein",
            "pyapon",
            "thabaung",
            "wakema",
            "yegyi",
            "zalun",


            "bago",
            "daik-u",
            "kawa",
            "kyaukkyi",
            "kyauktaga",
            "nyaunglebin",
            "oktwin",
            "phyu",
            "shwegyin",
            "tantabin",
            "taungoo",
            "tanatpin",
            "waw",
            "yedashe",
            "gyobingauk",
            "letpadan",
            "minhla-2",
            "monyo",
            "nattalin",
            "okpho",
            "padaung",
            "paukkaung",
            "paungde",
            "pyay",
            "shwedaung",
            "thayarwady",
            "thegon",
            "zigon",


            "falam",
            "hakha",
            "htantlang",
            "kanpetlet",
            "madupi",
            "mindat",
            "paletwa",
            "tiddim",
            "tonzang",


            "bhamo",
            "chipwi",
            "hpakan",
            "injangyang",
            "kawnglanghpu",
            "machanbaw",
            "mansi",
            "mogaung",
            "mohnyin",
            "momauk",
            "myitkyina",
            "nogmung",
            "puta-o",
            "shwegu",
            "sumprabum",
            "tanai",
            "tsawlaw",
            "waingmaw",


            "bawlakhe",
            "demoso",
            "hpasawng",
            "hpruso",
            "loikaw",
            "mese",
            "shadaw",


            "hlaingbwe",
            "hpa-an",
            "hpapun",
            "kawkareik",
            "kyainseikgyi",
            "myawaddy",
            "thandaung",


            "aunglan",
            "chauk",
            "gangaw",
            "kamma",
            "magway",
            "minbu",
            "mindon",
            "minhla",
            "myaing",
            "myothit",
            "natmauk",
            "ngape",
            "pakokku",
            "pauk",
            "pwintbyu",
            "salin",
            "saw",
            "seikphyu",
            "sidoktaya",
            "sinbaungwe",
            "taungdwingyi",
            "thayet",
            "tilin",
            "yenangyaung",
            "yesagyo",


            "amarapura",
            "m-aungmyaythazan",
            "m-chanayethazan",
            "m-chanmyathazi",
            "kyaukpadaung",
            "kyaukse",
            "lewe",
            "madaya",
            "m-mahaaungmyay",
            "mahlaing",
            "meiktila",
            "mogoke",
            "myingyan",
            "myittha",
            "natogyi",
            "ngazun",
            "nyaung-u",
            "patheingyi",
            "pyawbwe",
            "m-pyigyitagon",
            "pyinmana",
            "pyinoolwin",
            "singu",
            "sintgaing",
            "tada-u",
            "tatkon",
            "taungtha",
            "thabeikkyin",
            "thazi",
            "wundwin",
            "yamethin",


            "bilin",
            "chaungzon",
            "kyaikmaraw",
            "kyaikto",
            "mawlamyine",
            "mudon",
            "paung",
            "thanbyuzayat",
            "thaton",
            "ye",


            "ann",
            "buthidaung",
            "gwa",
            "kyaukpyu",
            "kyauktaw",
            "maungdaw",
            "minbya",
            "mrauk-u",
            "munaung",
            "myebon",
            "pauktaw",
            "ponnagyun",
            "ramree",
            "rathedaung",
            "sittwe",
            "thandwe",
            "toungup",


            "ayadaw",
            "banmauk",
            "budalin",
            "chaung-u",
            "hkamti",
            "homalin",
            "indaw",
            "kale",
            "kalewa",
            "kanbalu",
            "kani",
            "katha",
            "kawlin",
            "khin-u",
            "kyunhla",
            "lahe",
            "layshi",
            "mawlaik",
            "mingin",
            "monywa",
            "myaung",
            "myinmu",
            "nanyun",
            "pale",
            "paungbyin",
            "pinlebu",
            "sagaing",
            "salingyi",
            "shwebo",
            "tabayin",
            "tamu",
            "taze",
            "tigyaing",
            "wetlet",
            "wuntho",
            "ye-u",
            "yinmabin",


            "kengtung",
            "matman",
            "monghpyak",
            "monghsat",
            "mongkhet",
            "mongla",
            "mongping",
            "mongton",
            "mongyang",
            "mongyawng",
            "tachileik",


            "hopang",
            "hseni",
            "hsipaw",
            "konkyan",
            "kunlong",
            "kutkai",
            "kyaukme",
            "lashio",
            "laukkaing",
            "mabein",
            "manton",
            "mongmao",
            "mongmit",
            "mongyai",
            "muse",
            "namhsan",
            "namphan",
            "namtu",
            "nanhkan",
            "nawnghkio",
            "pangsang",
            "pangwaun",
            "tangyan",


            "hopong",
            "hsihseng",
            "kalaw",
            "kunhing",
            "kyethi",
            "laihka",
            "langkho",
            "lawksawk",
            "loilen",
            "mawkmai",
            "monghsu",
            "mongkaung",
            "mongnai",
            "mongpan",
            "nansang",
            "nyaungshwe",
            "pekon",
            "pindaya",
            "pinlaung",
            "taunggyi",
            "ywangan",


            "bokpyin",
            "dawei",
            "kawthoung",
            "kyunsu",
            "launglon",
            "myeik",
            "palaw",
            "tanintharyi",
            "thayetchaung",
            "yebyu",


            "y-ahlone",
            "y-bahan",
            "y-botahtaung",
            "y-cocokyun",
            "y-dagon",
            "y-dagonmyothitea",
            "y-dagonmyothitno",
            "y-dagonmyothitse",
            "y-dagonmyothitso",
            "y-dala",
            "y-dawbon",
            "y-hlaing",
            "y-hlaingtharya",
            "hlegu",
            "hmawbi",
            "htantabin",
            "y-insein",
            "y-kamaryut",
            "kawhmu",
            "kayan",
            "kungyangon",
            "kyauktan",
            "y-kyeemyindaing",
            "y-lanmadaw",
            "y-latha",
            "y-mayangone",
            "y-mingaladon",
            "y-mingalartaungnyunt",
            "y-northokkalapa",
            "y-pabedan",
            "y-pazundaung",
            "y-sanchaung",
            "y-seikgyikanaungto",
            "y-seikkan",
            "y-shwepyithar",
            "y-southokkalapa",
            "taikkyi",
            "y-tamwe",
            "y-thaketa",
            "thanlyin",
            "y-thingangkuun",
            "thongwa",
            "twantay",
            "y-yankin",
        ]

        var khayines = [
            "ky-loikaw",
            "ky-bawlakhe",
            "ky-kawthoung",
            "ky-myeik",
            "ky-dawei",
            "ky-kawkareik",
            "ky-myawaddy",
            "ky-hpa-an",
            "ky-hpapun",
            "ky-mawlamyine",
            "ky-thaton",
            "ky-syangon",
            "ky-wyangon",
            "ky-eyangon",
            "ky-nyangon",
            "ky-pathein",
            "ky-myaungmya",
            "ky-hinthada",
            "ky-maubin",
            "ky-labutta",
            "ky-pyapon",
            "ky-bago",
            "ky-taungoo",
            "ky-thayarwady",
            "ky-pyay",
            "ky-nyaung-u",
            "ky-yamethin",
            "ky-naypyitaw",
            "ky-meiktila",
            "ky-myingyan",
            "ky-kyaukse",
            "ky-mandalay",
            "ky-pyinoolwin",
            "ky-thayet",
            "ky-magway",
            "ky-minbu",
            "ky-pakokku",
            "ky-gangaw",
            "ky-thandwe",
            "ky-kyaukpyu",
            "ky-mrauk-u",
            "ky-sittwe",
            "ky-maungdaw",
            "ky-mindat",
            "ky-hakha",
            "ky-falam",
            "ky-tachileik",
            "ky-monghpyak",
            "ky-kengtung",
            "ky-monghsat",
            "ky-langkho",
            "ky-loilen",
            "ky-taunggyi",
            "ky-matman",
            "ky-hopang",
            "ky-lashio",
            "ky-kunlong",
            "ky-muse",
            "ky-kyaukme",
            "ky-kale",
            "ky-yinmabin",
            "ky-shwebo",
            "ky-monywa",
            "ky-sagaing",
            "ky-kanbalu",
            "ky-mawlaik",
            "ky-katha",
            "ky-hkamti",
            "ky-puta-o",
            "ky-myitkyina",
            "ky-mohnyin",
            "ky-bhamo"
        ]

        var khayines_pos = [
            ["ky-loikaw","400","450"],
            ["ky-bawlakhe","400","450"],
            ["ky-kawthoung","400","450"]
        ]

        var divisions = [
            "div-mandalay",
            "div-magway",
            "div-eshan",
            "div-sshan",
            "div-nshan",
            "div-kayar",
            "div-kayin",
            "div-tanintharyi",
            "div-mon",
            "div-ebago",
            "div-wbago",
            "div-yangon",
            "div-ayeyarwaddy",
            "div-rakhine",
            "div-sagaing",
            "div-kachin",
            "div-chin"
        ]

        var divisions_mm = [
            [
            "div-ayeyarwaddy",
            "Ayeyarwaddy Region",
            "ဧရာဝတီ တိုင်းဒေသကြီး",
            "ဧရာဝတီ တိုင္းေဒသႀကီး"
            ],
            [
            "div-ebago",
            "East Bago Region",
            "ပဲခူးအရှေ့ပိုင်း တိုင်းဒေသကြီး",
            "ပဲခူးအေရွ႕ပိုင္း တိုင္းေဒသႀကီး"
            ],
            [
            "div-chin",
            "Chin State",
            "ချင်း ပြည်နယ်",
            "ခ်င္း ျပည္နယ္"
            ],
            [
            "div-kachin",
            "Kachin State",
            "ကချင် ပြည်နယ်",
            "ကခ်င္ ျပည္နယ္"
            ],
            [
            "div-kayar",
            "Kayah State",
            "ကယား ပြည်နယ်",
            "ကယား ျပည္နယ္"
            ],
            [
            "div-kayin",
            "Kayin State",
            "ကရင် ပြည်နယ်",
            "ကရင္ ျပည္နယ္"
            ],
            [
            "div-magway",
            "Magway Region",
            "မကွေး တိုင်းဒေသကြီး",
            "မေကြး တိုင္းေဒသႀကီး"
            ],
            [
            "div-mandalay",
            "Mandalay Region",
            "မန္တလေး တိုင်းဒေသကြီး",
            "မႏၲေလး တိုင္းေဒသႀကီး"
            ],
            [
            "div-mon",
            "Mon State",
            "မွန်ပြည်နယ်",
            "မြန္ ျပည္နယ္"
            ],
            [
            "div-rakhine",
            "Rakhine State",
            "ရခိုင် ပြည်နယ်",
            "ရခိုင္ ျပည္နယ္"
            ],
            [
            "div-eshan",
            "East Shan State",
            "အရှေ့ပိုင်း ရှမ်းပြည်နယ်",
            "အေရွ႕ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
            "div-sagaing",
            "Sagaing Region",
            "စစ်ကိုင်း တိုင်းဒေသကြီး",
            "အေရွ႕ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
            "div-tanintharyi",
            "Tanintharyi Region",
            "တနင်္သာရီ တိုင်းဒေသကြီး",
            "တနသၤာရီ တိုင္းေဒသႀကီး"
            ],
            [
            "div-yangon",
            "Yangon Region",
            "ရန်ကုန် တိုင်းဒေသကြီး",
            "ရန္ကုန္ တိုင္းေဒသႀကီး"
            ],
            [
            "div-sshan",
            "South Shan State",
            "တောင်ပိုင်း ရှမ်းပြည်နယ်",
            "ေတာင္ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
            "div-nshan",
            "North Shan State",
            "မြောက်ပိုင်း ရှမ်းပြည်နယ်",
            "ေျမာက္ပိုင္း ရွမ္းျပည္နယ္"
            ],
            [
            "div-wbago",
            "West Bago State",
            "ပဲခူးအနောက်ပိုင်း တိုင်းဒေသကြီး",
            "ပဲခူးအေနာက္ပိုင္း တိုင္းေဒသႀကီး"
            ]
        ];

        var khayines_mm = [
            [
            "ky-gangaw",
            "Gangaw",
            "ဂန့်ဂေါ",
            "ဂန႔္ေဂါ"
            ],
            [
            "ky-magway",
            "Magway",
            "မကွေး",
            "မေကြး"
            ],
            [
            "ky-minbu",
            "Minbu",
            "မင်းဘူး",
            "မင္းဘူး"
            ],
            [
            "ky-pakokku",
            "Pakokku",
            "ပခုက္ကူ",
            "ပခုကၠဴ"
            ],
            [
            "ky-thayet",
            "Thayet",
            "သရက်",
            "သရက္"
            ],
            [
            "ky-kyaukse",
            "Kyaukse",
            "ကျောက်ဆည်",
            "ေက်ာက္ဆည္"
            ],
            [
            "ky-mandalay",
            "Mandalay",
            "မန္တလေး",
            "မႏၲေလး"
            ],
            [
            "ky-meiktila",
            "Meiktila",
            "မိတ္ထီလာ",
            "မိတၳီလာ"
            ],
            [
            "ky-myingyan",
            "Myingyan",
            "မြင်းခြံ",
            "ျမင္းၿခံ"
            ],
            [
            "ky-nyaung-u",
            "Nyaung-U",
            "ညောင်ဦး",
            "ေညာင္ဦး"
            ],
            [
            "ky-pyinoolwin",
            "Pyinoolwin",
            "ပြင်ဦးလွင်",
            "ျပင္ဦးလြင္"
            ],
            [
            "ky-yamethin",
            "Yamethin",
            "ရမည်းသင်း",
            "ရမည္းသင္း"
            ],
            [
            "ky-hinthada",
            "Hinthada",
            "ဟင်္သာတ",
            "ဟသၤာတ"
            ],
            [
            "ky-labutta",
            "Labutta",
            "လပွတ္တာ",
            "လပြတၱာ"
            ],
            [
            "ky-maubin",
            "Maubin",
            "မအူပင်",
            "မအူပင္"
            ],
            [
            "ky-myaungmya",
            "Myaungmya",
            "မြောင်းမြ",
            "ေျမာင္းျမ"
            ],
            [
            "ky-pathein",
            "Pathein",
            "ပုသိမ်",
            "ပုသိမ္"
            ],
            [
            "ky-pyapon",
            "Pyapon",
            "ဖျာပုံ",
            "ဖ်ာပုံ"
            ],
            [
            "ky-bago",
            "Bago",
            "ပဲခူး",
            "ပဲခူး"
            ],
            [
            "ky-taungoo",
            "Taungoo",
            "တောင်ငူ",
            "ေတာင္ငူ"
            ],
            [
            "ky-pyay",
            "Pyay",
            "ပြည်",
            "ျပည္"
            ],
            [
            "ky-thayarwady",
            "Thayarwaddy",
            "သာယာဝတီ",
            "သာယာဝတီ"
            ],
            [
            "ky-hakha",
            "Hakha",
            "ဟားခါး",
            "ဟားခါး"
            ],
            [
            "ky-mindat",
            "Mindat",
            "မင်းတပ်",
            "မင္းတပ္"
            ],
            [
            "ky-bhamo",
            "Bhamo",
            "ဗန်းမော်",
            "ဗန္းေမာ္"
            ],
            [
            "ky-mohnyin",
            "Mohnyin",
            "မိုးညှင်း",
            "မိုးညႇင္း"
            ],
            [
            "ky-myitkyina",
            "Myitkyina",
            "မြစ်ကြီးနား",
            "ျမစ္ျကီးနား"
            ],
            [
            "ky-puta-o",
            "Puta-O",
            "ပူတာအို",
            "ပူတာအို"
            ],
            [
            "ky-bawlakhe",
            "Bawlakhe",
            "ဘော်လခဲ",
            "ေဘာ္လခဲ"
            ],
            [
            "ky-loikaw",
            "Loikaw",
            "လွိုင်ကော်",
            "လြိုင္ေကာ္"
            ],
            [
            "ky-hpa-an",
            "Hpa-An",
            "ဘားအံ",
            "ဘားအံ"
            ],
            [
            "ky-hpapun",
            "Hpapun",
            "ဖာပွန်",
            "ဖာပြန္"
            ],
            [
            "ky-kawkareik",
            "Kawkareik",
            "ကော့ကရိတ်",
            "ေကာ့ကရိတ္"
            ],
            [
            "ky-myawaddy",
            "Myawaddy",
            "မြဝတီ",
            "ျမ၀တီ"
            ],
            [
            "ky-mawlamyine",
            "Mawlamyine",
            "မော်လမြိုင်",
            "ေမာ္လျမိုင္"
            ],
            [
            "ky-thaton",
            "Thaton",
            "သထုံ",
            "သထံု"
            ],
            [
            "ky-kyaukpyu",
            "Kyaukpyu",
            "ကျောက်ဖြူ",
            "ေက်ာက္ျဖူ"
            ],
            [
            "ky-sittwe",
            "Sittwe",
            "စစ်တွေ",
            "စစ္ေတြ"
            ],
            [
            "ky-thandwe",
            "Thandwe",
            "သံတွဲ",
            "သံတြဲ"
            ],
            [
            "ky-mrauk-u",
            "Mrauk-U",
            "မြောက်ဦး",
            "ေျမာက္ဦး"
            ],
            [
            "ky-kengtung",
            "Kengtung",
            "ကျိုင်းတုံ",
            "က်ိုင္းတံု"
            ],
            [
            "ky-tachileik",
            "Tachileik",
            "တာချီလိတ်",
            "တာခ်ီလိတ္"
            ],
            [
            "ky-kunlong",
            "Kunlong",
            "ကွမ်းလုံ",
            "ကြမ္းလုံ"
            ],
            [
            "ky-kyaukme",
            "Kyaukme",
            "ကျောက်မဲ",
            "ေက်ာက္မဲ"
            ],
            [
            "ky-lashio",
            "Lashio",
            "လားရှိုး",
            "လားရွိဳး"
            ],
            [
            "ky-langkho",
            "Langkho",
            "လင်းခေး",
            "လင္းေခး"
            ],
            [
            "ky-loilen",
            "Loilen",
            "လွိုင်လင်",
            "လြိုင္လင္"
            ],
            [
            "ky-taunggyi",
            "Taunggyi",
            "တောင်ကြီး",
            "ေတာင္ျကီး"
            ],
            [
            "ky-kanbalu",
            "Kanbalu",
            "ကန့်ဘလူ",
            "ကန့္ဘလူ"
            ],
            [
            "ky-kale",
            "Kale",
            "ကလေး",
            "ကေလး"
            ],
            [
            "ky-katha",
            "Katha",
            "ကသာ",
            "ကသာ"
            ],
            [
            "ky-mawlaik",
            "Mawlaik",
            "မော်လိုက်",
            "ေမာ္လိုက္"
            ],
            [
            "ky-monywa",
            "Monywa",
            "မုံရွာ",
            "မံုရြာ"
            ],
            [
            "ky-sagaing",
            "Sagaing",
            "စစ်ကိုင်း",
            "စစ္ကိုင္း"
            ],
            [
            "ky-shwebo",
            "Shwebo",
            "ရွှေဘို",
            "ေရြွဘို"
            ],
            [
            "ky-myeik",
            "Myeik",
            "မြိတ်",
            "ျမိတ္"
            ],
            [
            "ky-kawthoung",
            "Kawthoung",
            "ကော့သောင်း",
            "ေကာ့ေသာင္း"
            ],
            [
            "ky-dawei",
            "Dawei",
            "ထားဝယ်",
            "ထား၀ယ္"
            ],
            [
            "ky-syangon",
            "South Yangon",
            "ရန်ကုန်တောင်ပိုင်း",
            "ရန္ကုန္ေတာင္ပိုင္း"
            ],
            [
            "ky-wyangon",
            "West Yangon",
            "ရန်ကုန်အနောက်ပိုင်း",
            "ရန္ကုန္အေနာက္ပိုင္း"
            ],
            [
            "ky-eyangon",
            "East Yangon",
            "ရန်ကုန်အရှေ့ပိုင်း",
            "ရန္ကုန္အေရွ့ပိုင္း"
            ],
            [
            "ky-nyangon",
            "North Yangon",
            "ရန်ကုန်မြောက်ပိုင်း",
            "ရန္ကုန္ေျမာက္ပိုင္း"
            ],
            [
            "ky-naypyitaw",
            "Naypyidaw",
            "နေပြည်တော်",
            "ေနျပည္ေတာ္"
            ],
            [
            "ky-maungdaw",
            "Maungdaw",
            "မောင်းတော",
            "ေမာင္းေတာ"
            ],
            [
            "ky-falam",
            "Falam",
            "ဖလမ်း",
            "ဖလမ္း"
            ],
            [
            "ky-monghpyak",
            "Monghpyak",
            "မိုင်းဖြတ်",
            "မိုင္းျဖတ္"
            ],
            [
            "ky-monghsat",
            "Monghsat",
            "မိုင်းဆတ်",
            "မိုင္းဆတ္"
            ],
            [
            "ky-matman",
            "Matman",
            "မက်မန်း",
            "မက္မန္း"
            ],
            [
            "ky-hopang",
            "Hopang",
            "ဟိုပင်",
            "ဟိုပင္"
            ],
            [
            "ky-muse",
            "Muse",
            "မူဆယ်",
            "မူဆယ္"
            ],
            [
            "ky-yinmabin",
            "Yinmabin",
            "ယင်းမာပင်",
            "ယင္းမာပင္"
            ],
            [
            "ky-hkamti",
            "Hkamti",
            "ခန္တီး",
            "ခႏၲီး"
            ]
        ];



        var townships_mm = [
        [
          "yangon-gp",
          "Yangon",
          "ရန်ကုန်",
          "ဂန႔္ေဂါ"
        ],
        [
          "mandalay-gp",
          "Mandalay",
          "မန္တလေး",
          "မန္တလေး"
        ],
      [
        "gangaw",
        "Gangaw",
        "ဂန့်ဂေါ",
        "ဂန႔္ေဂါ"
      ],
      [
        "saw",
        "Saw",
        "ဆော",
        "ေဆာ"
      ],
      [
        "tilin",
        "Tilin",
        "ထီးလင်း",
        "ထီးလင္း"
      ],
      [
        "chauk",
        "Chauk",
        "ချောက်",
        "ေခ်ာက္"
      ],
      [
        "magway",
        "Magway",
        "မကွေး",
        "မေကြး"
      ],
      [
        "myothit",
        "Myothit",
        "မြို့သစ်",
        "ၿမိဳ႕သစ္"
      ],
      [
        "natmauk",
        "Natmauk",
        "နတ်မောက်",
        "နတ္ေမာက္"
      ],
      [
        "taungdwingyi",
        "Taungdwingyi",
        "တောင်တွင်းကြီး",
        "ေတာင္တြင္းႀကီး"
      ],
      [
        "yenangyaung",
        "Yenangyaung",
        "ရေနံချောင်း",
        "ေရနံေခ်ာင္း"
      ],
      [
        "minbu",
        "Minbu",
        "မင်းဘူး",
        "မင္းဘူး"
      ],
      [
        "ngape",
        "Ngape",
        "ငဖဲ",
        "ငဖဲ"
      ],
      [
        "pwintbyu",
        "Pwintbyu",
        "ပွင့်ဖြူ",
        "ပြင့္ျဖဴ"
      ],
      [
        "salingyi",
        "Salingyi",
        "ဆာလင်းကြီး",
        "ဆာလင္းႀကီး"
      ],
      [
        "sidoktaya",
        "Sidoktaya",
        "စေတ္တုတရာ",
        "ေစတၱဳတရာ"
      ],
      [
        "myaing",
        "Myaing",
        "မြိုင်",
        "ၿမိဳင္"
      ],
      [
        "pakokku",
        "pakokku",
        "ပခုက္ကူ",
        "ပခုကၠဴ"
      ],
      [
        "pauk",
        "pauk",
        "ပေါက်",
        "ေပါက္"
      ],
      [
        "seikphyu",
        "seikphyu",
        "ဆိပ်ဖြူ",
        "ဆိပ္ျဖဴ"
      ],
      [
        "yesagyo",
        "Yesagyo",
        "ရေစကြို",
        "ေရစႀကိဳ"
      ],
      [
        "aunglan",
        "Aunglan",
        "အောင်လံ",
        "ေအာင္လံ"
      ],
      [
        "kamma",
        "Kamma",
        "ကမ္မ",
        "ကမၼ"
      ],
      [
        "mindon",
        "Mindon",
        "မင်းတုန်း",
        "မင္းတုန္း"
      ],
      [
        "minhla",
        "Minhla",
        "မင်းလှ",
        "မင္းလွ"
      ],
      [
        "sinbaungwe",
        "Sinbaungwe",
        "ဆင်ပေါင်ဝဲ",
        "ဆင္ေပါင္ဝဲ"
      ],
      [
        "thayet",
        "Thayet",
        "သရက်",
        "သရက္"
      ],
      [
        "kyaukse",
        "Kyaukse",
        "ကျောက်ဆညိ",
        "ေက်ာက္ဆညိ"
      ],
      [
        "myittha",
        "Myittha",
        "မြစ်သား",
        "ျမစ္သား"
      ],
      [
        "sintgaing",
        "Sintgaing",
        "စဉ့်ကိုင်",
        "စဥ့္ကိုင္"
      ],
      [
        "tada-u",
        "Tada-u",
        "တံတားဦး",
        "တံတားဦး"
      ],
      [
        "amarapura",
        "Amarapura",
        "အမရပူရ",
        "အမရပူရ"
      ],
      [
        "patheingyi",
        "Patheingyi",
        "ပုသိမ်ကြီး",
        "ပုသိမ္ႀကီး"
      ],
      [
        "mahlaing",
        "Mahlaing",
        "မလှိုင်",
        "မလႈိင္"
      ],
      [
        "meiktila",
        "Meiktila",
        "မိတ္ထီလာ",
        "မိတၳီလာ"
      ],
      [
        "thazi",
        "Thazi",
        "သာစည်",
        "သာစည္"
      ],
      [
        "wundwin",
        "Wundwin",
        "ဝမ်းတွင်း",
        "ဝမ္းတြင္း"
      ],
      [
        "myingyan",
        "Myingyan",
        "မြင်းခြံ",
        "ျမင္းၿခံ"
      ],
      [
        "natogyi",
        "Natogyi",
        "နွားထိုးကြီး",
        "ႏြားထိုးႀကီး"
      ],
      [
        "nyaung-u",
        "Nyaung-U",
        "ညောင်ဦး",
        "ေညာင္ဦး"
      ],
      [
        "kyaukpadaung",
        "Kyaukpadaung",
        "ကျောက်ပန်းတောင်း",
        "ေက်ာက္ပန္းေတာင္း"
      ],
      [
        "madaya",
        "Madaya",
        "မတ္တရာ",
        "မတၱရာ"
      ],
      [
        "mogoke",
        "Mogoke",
        "မိုးကုတ်",
        "မိုးကုတ္"
      ],
      [
        "pyinoolwin",
        "Pyinoolwin",
        "ပြင်ဦးလွင်",
        "ျပင္ဦးလြင္"
      ],
      [
        "singu",
        "Singu",
        "စဉ့်ကူး",
        "စဥ့္ကူး"
      ],
      [
        "thabeikkyin",
        "Thabeikkyin",
        "သပိတ်ကျင်း",
        "သပိတ္က်င္း"
      ],
      [
        "pyawbwe",
        "Pyawbwe",
        "ပျော်ဘွယ်",
        "ေပ်ာ္ဘြယ္"
      ],
      [
        "yamethin",
        "Yamethin",
        "ရမည်းသင်း",
        "ရမည္းသင္း"
      ],
      [
        "hinthada",
        "Hinthada",
        "ဟင်္သာတ",
        "ဟသၤာတ"
      ],
      [
        "lemyethna",
        "Lemyethna",
        "လေးမျက်နှာ",
        "ေလးမ်က္ႏွာ"
      ],
      [
        "zalun",
        "Zalun",
        "ဇလွန်",
        "ဇလြန္"
      ],
      [
        "ingapu",
        "Ingapu",
        "အင်္ဂပူ",
        "အဂၤပူ"
      ],
      [
        "kyangin",
        "Kyangin",
        "ကြံခင်း",
        "ႀကံခင္း"
      ],
      [
        "myanaung",
        "Myanaung",
        "မြန်အောင်",
        "ျမန္ေအာင္"
      ],
      [
        "labutta",
        "Labutta",
        "လပွတ္တာ",
        "လပြတၱာ"
      ],
      [
        "mawlamyinegyun",
        "Mawlamyinegyun",
        "မော်လမြိုင်ကျွန်း",
        "ေမာ္လၿမိဳင္ကြၽန္း"
      ],
      [
        "nyaungdon",
        "Nyaungdon",
        "ညောင်တုန်း",
        "ေညာင္တုန္း"
      ],
      [
        "pantanaw",
        "Pantanaw",
        "ပန်းတနော်",
        "ပန္းတေနာ္"
      ],
      [
        "einme",
        "Einme",
        "အိမ်မဲ",
        "အိမ္မဲ"
      ],
      [
        "wakema",
        "Wakema",
        "ဝါးခယ်မ",
        "ဝါးခယ္မ"
      ],
      [
        "ngapudaw",
        "Ngapudaw",
        "ငပုတော",
        "ငပုေတာ"
      ],
      [
        "pathein",
        "Pathein",
        "ပုသိမ်",
        "ပုသိမ္"
      ],
      [
        "thabaung",
        "Thabaung",
        "သာပေါင်း",
        "သာေပါင္း"
      ],
      [
        "kyaunggon",
        "Kyaunggon",
        "ကျောင်းကုန်း",
        "ေက်ာင္းကုန္း"
      ],
      [
        "kyonpyaw",
        "Kyonpyaw",
        "ကျုံပျော်",
        "က်ဳံေပ်ာ္"
      ],
      [
        "bogale",
        "Bogale",
        "ဘိုကလေး",
        "ဘိုကေလး"
      ],
      [
        "dedaye",
        "Dedaye",
        "ဒေးဒရဲ",
        "ေဒးဒရဲ"
      ],
      [
        "kyaiklat",
        "Kyaiklat",
        "ကျိုက်လတ်",
        "က်ိဳက္လတ္"
      ],
      [
        "pyapon",
        "Pyapon",
        "ဖျာပုံ",
        "ဖ်ာပုံ"
      ],
      [
        "bago",
        "Bago",
        "ပဲခူး",
        "ပဲခူး"
      ],
      [
        "daik-u",
        "Daik-u",
        "ဒိုက်ဦး",
        "ဒိုက္ဦး"
      ],
      [
        "kawa",
        "Kawa",
        "ကဝ",
        "ကဝ"
      ],
      [
        "nyaunglebin",
        "Nyaunglebin",
        "ညောင်လေးပင်",
        "ေညာင္ေလးပင္"
      ],
      [
        "shwegyin",
        "Shwegyin",
        "ရွှေကျင်",
        "ေ႐ႊက်င္"
      ],
      [
        "thanatpin",
        "Thanatpin",
        "သနပ်ပင်",
        "သနပ္ပင္"
      ],
      [
        "waw",
        "Waw",
        "ဝေါ",
        "ေဝါ"
      ],
      [
        "kyaukkyi",
        "Kyaukkyi",
        "ကျောက်ကြီး",
        "ေက်ာက္ႀကီး"
      ],
      [
        "oktwin",
        "Oktwin",
        "အုတ်တွင်း",
        "အုတ္တြင္း"
      ],
      [
        "tantabin",
        "Tantabin",
        "ထန်းတပင်",
        "ထန္းတပင္"
      ],
      [
        "taungoo",
        "Taungoo",
        "တောင်ငူ",
        "ေတာင္ငူ"
      ],
      [
        "yedashe",
        "Yedashe",
        "ရေတာရှည်",
        "ေရတာရွည္"
      ],
      [
        "padaung",
        "Padaung",
        "ပန်းတောင်း",
        "ပန္းေတာင္း"
      ],
      [
        "paukkaung",
        "Paukkaung",
        "ပေါက်ခေါင်း",
        "ေပါက္ေခါင္း"
      ],
      [
        "paungde",
        "Paungde",
        "ပေါင်းတည်",
        "ေပါင္းတည္"
      ],
      [
        "pyay",
        "Pyay",
        "ပြည်",
        "ျပည္"
      ],
      [
        "shwedaung",
        "Shwedaung",
        "ရွှေတောင်",
        "ေ႐ႊေတာင္"
      ],
      [
        "thegon",
        "Thegon",
        "သဲကုန်း",
        "သဲကုန္း"
      ],
      [
        "gyobingauk",
        "Gyobingauk",
        "ကြို့ပင်ကောက်",
        "ႀကိဳ႕ပင္ေကာက္"
      ],
      [
        "letpadan",
        "Letpadan",
        "လက်ပံတန်း",
        "လက္ပံတန္း"
      ],
      [
        "minhla-2",
        "Minhla-2",
        "မင်းလှ-2",
        "မင္းလွ-2"
      ],
      [
        "monyo",
        "Monyo",
        "မိုးညို",
        "မိုးညိဳ"
      ],
      [
        "okpho",
        "Okpho",
        "အုတ်ဖို",
        "အုတ္ဖို"
      ],
      [
        "thayarwady",
        "Thayarwady",
        "သာယာဝတီ",
        "သာယာဝတီ"
      ],
      [
        "nattalin",
        "Nattalin",
        "နတ်တလင်း",
        "နတ္တလင္း"
      ],
      [
        "zigon",
        "Zigon",
        "ဇီးကုန်း",
        "ဇီးကုန္း"
      ],
      [
        "falam",
        "Falam",
        "ဖလမ်း",
        "ဖလမ္း"
      ],
      [
        "tiddim",
        "Tiddim",
        "တီးတိန်",
        "တီးတိန္"
      ],
      [
        "hakha",
        "Hakha",
        "ဟားခါး",
        "ဟားခါး"
      ],
      [
        "htantlang",
        "Htantlang",
        "ထန်တလန်",
        "ထန္တလန္"
      ],
      [
        "kanpetlet",
        "Kanpetlet",
        "ကန်ပက်လက်",
        "ကန္ပက္လက္"
      ],
      [
        "mindat",
        "Mindat",
        "မင်းတပ်",
        "မင္းတပ္"
      ],
      [
        "paletwa",
        "Paletwa",
        "ပလက်ဝ",
        "ပလက္ဝ"
      ],
      [
        "bhamo",
        "Bhamo",
        "ဗန်းမော်",
        "ဗန္းေမာ္"
      ],
      [
        "mansi",
        "Mansi",
        "မံစီ",
        "မံစီ"
      ],
      [
        "momauk",
        "Momauk",
        "မိုးမောက်",
        "မိုးေမာက္"
      ],
      [
        "shwegu",
        "Shwegu",
        "ရွှေကူ",
        "ေ႐ႊကူ"
      ],
      [
        "hpakan",
        "Hpakan",
        "ဖားကန့်",
        "ဖားကန႔္"
      ],
      [
        "mogaung",
        "Mogaung",
        "မိုးကောင်း",
        "မိုးေကာင္း"
      ],
      [
        "mohnyin",
        "Mohnyin",
        "မိုးညှင်း",
        "မိုးညႇင္း"
      ],
      [
        "chipwi",
        "Chipwi",
        "ချီဗွေ",
        "ခ်ီေဗြ"
      ],
      [
        "injangyang",
        "Injangyang",
        "အင်ဂျန်းယန်",
        "အင္ဂ်န္းယန္"
      ],
      [
        "myitkyina",
        "Myitkyina",
        "မြစ်ကြီးနား",
        "ျမစ္ႀကီးနား"
      ],
      [
        "tanai",
        "Tanai",
        "တနိုင်း",
        "တႏိုင္း"
      ],
      [
        "waingmaw",
        "Waingmaw",
        "ဝိုင်းမော်",
        "ဝိုင္းေမာ္"
      ],
      [
        "kawnglanghpu",
        "Kawnglanghpu",
        "ခေါင်လန်ဖူး",
        "ေခါင္လန္ဖူး"
      ],
      [
        "machanbaw",
        "Machanbaw",
        "မချမ်းဘော",
        "မခ်မ္းေဘာ"
      ],
      [
        "nogmung",
        "Nogmung",
        "‌နောင်မွန်း",
        "‌ေနာင္မြန္း"
      ],
      [
        "puta-o",
        "Puta-O",
        "ပူတာအို",
        "ပူတာအို"
      ],
      [
        "sumprabum",
        "Sumprabum",
        "ဆွမ်ပရာဘွမ်",
        "ဆြမ္ပရာဘြမ္"
      ],
      [
        "bawlakhe",
        "Bawlakhe",
        "ဘော်လခဲ",
        "ေဘာ္လခဲ"
      ],
      [
        "mese",
        "Mese",
        "မယ်စဲ့",
        "မယ္စဲ့"
      ],
      [
        "demoso",
        "Demoso",
        "‌ဒီမောဆိုး",
        "‌ဒီေမာဆိုး"
      ],
      [
        "hpruso",
        "Hpruso",
        "ဖရူးဆိုး",
        "ဖ႐ူးဆိုး"
      ],
      [
        "loikaw",
        "Loikaw",
        "လွိုင်ကော်",
        "လြိဳင္ေကာ္"
      ],
      [
        "shadaw",
        "Shadaw",
        "ရှားတော",
        "ရွားေတာ"
      ],
      [
        "hpa-an",
        "Hpa-An",
        "ဘားအံ",
        "ဘားအံ"
      ],
      [
        "thandaung",
        "Thandaung",
        "သံတောင်ကြီး",
        "သံေတာင္ႀကီး"
      ],
      [
        "kawkareik",
        "Kawkareik",
        "ကော့ကရိတ်",
        "ေကာ့ကရိတ္"
      ],
      [
        "myawaddy",
        "Myawaddy",
        "မြဝတီ",
        "ျမဝတီ"
      ],
      [
        "chaungzon",
        "Chaungzon",
        "ချောင်းဆုံ",
        "ေခ်ာင္းဆုံ"
      ],
      [
        "kyaikmaraw",
        "Kyaikmaraw",
        "ကျိုက်မရော",
        "က်ိဳက္မေရာ"
      ],
      [
        "mawlamyine",
        "Mawlamyine",
        "မော်လမြိုင်",
        "ေမာ္လၿမိဳင္"
      ],
      [
        "mudon",
        "Mudon",
        "မုဒုံ",
        "မုဒုံ"
      ],
      [
        "thanbyuzayat",
        "Thanbyuzayat",
        "သံဖြူဇရပ်",
        "သံျဖဴဇရပ္"
      ],
      [
        "ye",
        "Ye",
        "ရေး",
        "ေရး"
      ],
      [
        "bilin",
        "Bilin",
        "ဘီးလင်း",
        "ဘီးလင္း"
      ],
      [
        "kyaikto",
        "Kyaikto",
        "ကျိုက်ထို",
        "က်ိဳက္ထို"
      ],
      [
        "paung",
        "Paung",
        "ပေါင်",
        "ေပါင္"
      ],
      [
        "thaton",
        "Thaton",
        "သထုံ",
        "သထုံ"
      ],
      [
        "ann",
        "Ann",
        "အမ်း",
        "အမ္း"
      ],
      [
        "kyaukpyu",
        "Kyaukpyu",
        "ကျောက်ဖြူ",
        "ေက်ာက္ျဖဴ"
      ],
      [
        "ramree",
        "Ramree",
        "ရမ်းဗြဲ",
        "ရမ္းၿဗဲ"
      ],
      [
        "buthidaung",
        "Buthidaung",
        "ဘူးသီးတောင်",
        "ဘူးသီးေတာင္"
      ],
      [
        "maungdaw",
        "Maungdaw",
        "မောင်တော",
        "ေမာင္ေတာ"
      ],
      [
        "pauktaw",
        "Pauktaw",
        "ပေါက်တော",
        "ေပါက္ေတာ"
      ],
      [
        "ponnagyun",
        "Ponnagyun",
        "ပုဏ္ဏားကျွန်း",
        "ပုဏၰားကြၽန္း"
      ],
      [
        "rathedaung",
        "Rathedaung",
        "ရသေ့တောင်",
        "ရေသ့ေတာင္"
      ],
      [
        "sittwe",
        "Sittwe",
        "စစ်တွေ",
        "စစ္ေတြ"
      ],
      [
        "thandwe",
        "Thandwe",
        "သံတွဲ",
        "သံတြဲ"
      ],
      [
        "toungup",
        "Toungup",
        "တောင်ကုတ်",
        "ေတာင္ကုတ္"
      ],
      [
        "kyauktaw",
        "Kyauktaw",
        "ကျောက်တော်",
        "ေက်ာက္ေတာ္"
      ],
      [
        "minbya",
        "Minbya",
        "မင်းပြား",
        "မင္းျပား"
      ],
      [
        "mrauk-u",
        "Mrauk-U",
        "မြောက်ဦး",
        "ေျမာက္ဦး"
      ],
      [
        "myebon",
        "Myebon",
        "မြေပုံ",
        "ေျမပုံ"
      ],
      [
        "kengtung",
        "Kengtung",
        "ကျိုင်းတုံ",
        "က်ိဳင္းတုံ"
      ],
      [
        "tachileik",
        "Tachileik",
        "တာချီလိတ်",
        "တာခ်ီလိတ္"
      ],
      [
        "kunlong",
        "Kunlong",
        "ကွမ်းလုံ",
        "ကြမ္းလုံ"
      ],
      [
        "hsipaw",
        "Hsipaw",
        "သီပေါ",
        "သီေပါ"
      ],
      [
        "kyaukme",
        "Kyaukme",
        "ကျောက်မဲ",
        "ေက်ာက္မဲ"
      ],
      [
        "namtu",
        "Namtu",
        "နမ္မတူ",
        "နမၼတူ"
      ],
      [
        "nawnghkio",
        "Nawnghkio",
        "နောင်ချို",
        "ေနာင္ခ်ိဳ"
      ],
      [
        "hseni",
        "Hseni",
        "သိန္ဓီ",
        "သိႏၶီ"
      ],
      [
        "lashio",
        "Lashio",
        "လားရှိုး",
        "လားရႈိး"
      ],
      [
        "mongyai",
        "Mongyai",
        "မိုင်းရယ်",
        "မိုင္းရယ္"
      ],
      [
        "tangyan",
        "Tangyan",
        "တန်ယန်း",
        "တန္ယန္း"
      ],
      [
        "kutkai",
        "Kutkai",
        "ကွတ်ခိုင်",
        "ကြတ္ခိုင္"
      ],
      [
        "muse",
        "Muse",
        "မူဆယ်",
        "မူဆယ္"
      ],
      [
        "mabein",
        "Mabein",
        "မဘိမ်း",
        "မဘိမ္း"
      ],
      [
        "mongmit",
        "Mongmit",
        "မိုးမိတ်",
        "မိုးမိတ္"
      ],
      [
        "laukkaing",
        "Laukkaing",
        "လောက်ကိုင်",
        "ေလာက္ကိုင္"
      ],
      [
        "konkyan",
        "Konkyan",
        "ကုန်းကြမ်း",
        "ကုန္းၾကမ္း"
      ],
      [
        "manton",
        "Manton",
        "မိုင်းတုံ",
        "မိုင္းတုံ"
      ],
      [
        "hopang",
        "Hopang",
        "ဟိုပန်",
        "ဟိုပန္"
      ],
      [
        "pangwaun",
        "Pangwaun",
        "ပန်ဝိုင်",
        "ပန္ဝိုင္"
      ],
      [
        "matman",
        "Matman",
        "မက်မန်း",
        "မက္မန္း"
      ],
      [
        "namphan",
        "Namphan",
        "နားဖန်း",
        "နားဖန္း"
      ],
      [
        "pangsang",
        "Panghsang",
        "ပန်ဆန်း",
        "ပၢင်သၢင်း"
      ],
      [
        "langkho",
        "Langkho",
        "လင်းခေး",
        "လင္းေခး"
      ],
      [
        "mawkmai",
        "Mawkmai",
        "မောက်မယ်",
        "ေမာက္မယ္"
      ],
      [
        "kunhing",
        "Kunhing",
        "ၵုၼ္ႁဵင္",
        "ၵုၼ်ႁဵင်"
      ],
      [
        "kyethi",
        "Kyethi",
        "ကျေးသီး",
        "ေက်းသီး"
      ],
      [
        "loilen",
        "Loilen",
        "လွိုင်လင်",
        "လြိဳင္လင္"
      ],
      [
        "monghsu",
        "Monghsu",
        "မိုင်းရှူး",
        "မိုင္းရႉး"
      ],
      [
        "nansang",
        "Namsang",
        "နမ့်စန်",
        "နမ့္စန္"
      ],
      [
        "kalaw",
        "Kalaw",
        "ကလော",
        "ကေလာ"
      ],
      [
        "lawksawk",
        "Lawksawk",
        "ရပ်စောက်",
        "ရပ္ေစာက္"
      ],
      [
        "nyaungshwe",
        "Nyaungshwe",
        "ညောင်ရွှေ",
        "ေညာင္ေ႐ႊ"
      ],
      [
        "pekon",
        "Pekon",
        "ဖယ်ခုံ",
        "ဖယ္ခုံ"
      ],
      [
        "taunggyi",
        "Taunggyi",
        "တောင်ကြီး",
        "ေတာင္ႀကီး"
      ],
      [
        "pindaya",
        "Pindaya",
        "ပင်းတယ",
        "ပင္းတယ"
      ],
      [
        "ywangan",
        "Ywangan",
        "ရွာငံ",
        "႐ြာငံ"
      ],
      [
        "hopong",
        "Hopong",
        "ဟိုပုံး",
        "ဟိုပုံး"
      ],
      [
        "pinlaung",
        "Pinlaung",
        "ပင်လောင်း",
        "ပင္ေလာင္း"
      ],
      [
        "hkamti",
        "Hkamti",
        "ခန်တီး",
        "ခန္တီး"
      ],
      [
        "homalin",
        "Homalin",
        "ဟုမ္မလင်း",
        "ဟုမၼလင္း"
      ],
      [
        "kanbalu",
        "Kanbalu",
        "ကန့်ဘလူ",
        "ကန႔္ဘလူ"
      ],
      [
        "kyunhla",
        "Kyun Hla",
        "ကျွန်းလှ",
        "ကြၽန္းလွ"
      ],
      [
        "kale",
        "Kale",
        "ကလေး",
        "ကေလး"
      ],
      [
        "kalewa",
        "Kalewa",
        "ကလေး၀",
        "ကေလး၀"
      ],
      [
        "mingin",
        "Mingin",
        "မင်းကင်း",
        "မင္းကင္း"
      ],
      [
        "banmauk",
        "Banmauk",
        "ဗန်းမောက်",
        "ဗန္းေမာက္"
      ],
      [
        "indaw",
        "Indaw",
        "အင်းတော်",
        "အင္းေတာ္"
      ],
      [
        "katha",
        "Katha",
        "ကသာ",
        "ကသာ"
      ],
      [
        "kawlin",
        "Kawlin",
        "ကောလင်း",
        "ေကာလင္း"
      ],
      [
        "pinlebu",
        "Pinlebu",
        "ပင်လည်ဘူး",
        "ပင္လည္ဘူး"
      ],
      [
        "tigyaing",
        "Tigyaing",
        "ထီးချိုင့်",
        "ထီးခ်ိဳင့္"
      ],
      [
        "wuntho",
        "Wuntho",
        "ဝန်းသို",
        "ဝန္းသို"
      ],
      [
        "mawlaik",
        "Mawlaik",
        "မော်လိုက်",
        "ေမာ္လိုက္"
      ],
      [
        "paungbyin",
        "Paungbyin",
        "ဖေါင်းပြင်",
        "ေဖါင္းျပင္"
      ],
      [
        "ayadaw",
        "Ayadaw",
        "အရာတော်",
        "အရာေတာ္"
      ],
      [
        "budalin",
        "Budalin",
        "ဘုတလင်",
        "ဘုတလင္"
      ],
      [
        "chaung-u",
        "Chaung-U",
        "ချောင်းဦး",
        "ေခ်ာင္းဦး"
      ],
      [
        "monywa",
        "Monywa",
        "မုံရွာ",
        "မံုရြာ"
      ],
      [
        "myaung",
        "Myaung",
        "မြောင်",
        "ေျမာင္"
      ],
      [
        "myinmu",
        "Myinmu",
        "မြင်းမူ",
        "ျမင္းမူ"
      ],
      [
        "sagaing",
        "Sagaing",
        "စစ်ကိုင်း",
        "စစ္ကိုင္း"
      ],
      [
        "khin-u",
        "Khin-U",
        "ခင်ဦး",
        "ခင္ဦး"
      ],
      [
        "shwebo",
        "Shwebo",
        "ရွှေဘို",
        "ေရြွဘို"
      ],
      [
        "wetlet",
        "Wetlet",
        "၀က်လက်",
        "၀က္လက္"
      ],
      [
        "tabayin",
        "Tabayin",
        "ဒီပဲယင်း",
        "ဒီပဲယင္း"
      ],
      [
        "tamu",
        "Tamu",
        "တမူး",
        "တမူး"
      ],
      [
        "kani",
        "Kani",
        "ကနီ",
        "ကနီ"
      ],
      [
        "pale",
        "Pale",
        "ပုလဲ",
        "ပုလဲ"
      ],
      [
        "yinmabin",
        "Yinmabin",
        "ယင်းမာပင်",
        "ယင္းမာပင္"
      ],
      [
        "lahe",
        "Lahe",
        "လဟယ်",
        "လဟယ္"
      ],
      [
        "nanyun",
        "Nanyun",
        "နန်းယွန်း",
        "နန္းယြန္း"
      ],
      [
        "dawei",
        "Dawei",
        "ထားဝယ်",
        "ထား၀ယ္"
      ],
      [
        "launglon",
        "Launglon",
        "လောင်းလုံ",
        "ေလာင္းလံု"
      ],
      [
        "thayetchaung",
        "Thayetchaung",
        "သရက်ချောင်း",
        "သရက္ေခ်ာင္း"
      ],
      [
        "yebyu",
        "Yebyu",
        "ရေဖြူ",
        "ေရျဖူ"
      ],
      [
        "bokpyin",
        "Bokpyin",
        "ဘုတ်ပြင်း",
        "ဘုတ္ျပင္း"
      ],
      [
        "kawthoung",
        "Kawthaung",
        "ကော့သောင်း",
        "ေကာ့ေသာင္း"
      ],
      [
        "kyunsu",
        "Kyunsu",
        "ကျွန်းစု",
        "က်ြန္းစု"
      ],
      [
        "myeik",
        "Myeik",
        "မြိတ်",
        "ျမိတ္"
      ],
      [
        "palaw",
        "Palaw",
        "ပုလော",
        "ပုေလာ"
      ],
      [
        "tanintharyi",
        "Tanintharyi",
        "တနင်္သာရီ",
        "တနသၤာရီ"
      ],
      [
        "hlegu",
        "Hlegu",
        "လှည်းကူး",
        "လွည္းကူး"
      ],
      [
        "hmawbi",
        "Hmawbi",
        "မှော်ဘီ",
        "ေမွာ္ဘီ"
      ],
      [
        "htantabin",
        "Htantabin",
        "ထန်းတပင်",
        "ထန္းတပင္"
      ],
      [
        "taikkyi",
        "Taikkyi",
        "တိုက်ကြီး",
        "တိုက္ျကီး"
      ],
      [
        "kawhmu",
        "Kawhmu",
        "ကော့မှူး",
        "ေကာ့မွဴး"
      ],
      [
        "kayan",
        "Kayan",
        "ခရမ်း",
        "ခရမ္း"
      ],
      [
        "kungyangon",
        "Kungyangon",
        "ကွမ်းခြံကုန်း",
        "ကြမ္းၿခံကုန္း"
      ],
      [
        "kyauktan",
        "Kyauktan",
        "ကျောက်တန်း",
        "ေက်ာက္တန္း"
      ],
      [
        "thanlyin",
        "Thanlyin",
        "သန်လျင်",
        "သန္လ်င္"
      ],
      [
        "thongwa",
        "Thongwa",
        "သုံးခွ",
        "သံုးခြ"
      ],
      [
        "tatkon",
        "Tatkon",
        "တပ်ကုန်း",
        "တပ္ကုန္း"
      ],
      [
        "lewe",
        "Lewe",
        "လယ်ဝေး",
        "လယ္ေ၀း"
      ],
      [
        "pyinmana",
        "Pyinmana",
        "ပျဉ်းမနား",
        "ပ်ဥ္းမနား"
      ],
      [
        "danubyu",
        "Danubyu",
        "ဓနုဖြူ",
        "ဓနုျဖူ"
      ],
      [
        "kangyidaunt",
        "Kangyidaunt",
        "ကန်ကြီးထောင့်",
        "ကန္ႀကီးေထာင့္"
      ],
      [
        "maubin",
        "Maubin",
        "မအူပင်",
        "မအူပင္"
      ],
      [
        "myaungmya",
        "Myaungmya",
        "မြောင်းမြ",
        "ေျမာင္းျမ"
      ],
      [
        "yegyi",
        "Yegyi",
        "ရေကြည်",
        "ေရၾကည္"
      ],
      [
        "kyauktaga",
        "Kyauktaga",
        "ကျောက်တံခါး",
        "ေက်ာက္တံခါး"
      ],
      [
        "phyu",
        "Phyu",
        "ဖြူး",
        "ျဖူး"
      ],
      [
        "madupi",
        "Madupi",
        "မတူပီ",
        "မတူပီ"
      ],
      [
        "tonzang",
        "Tonzang",
        "တွန်းဇံ",
        "တြန္းဇံ"
      ],
      [
        "tsawlaw",
        "Tsawlaw",
        "ဆော့လော်",
        "ေဆာ့ေလာ္"
      ],
      [
        "hpasawng",
        "Hpasawng",
        "ဖားဆောင်း",
        "ဖားေဆာင္း"
      ],
      [
        "hlaingbwe",
        "Hlaingbwe",
        "လှိုင်းဘွဲ့",
        "လွိုင္းဘဲြ့"
      ],
      [
        "kyainseikgyi",
        "Kyainseikgyi",
        "ကြာအင်းဆိပ်ကြီး",
        "ျကာအင္းဆိပ္ျကီး"
      ],
      [
        "ngazun",
        "Ngazun",
        "ငါန်းဇွန်",
        "ငါန္းဇြန္"
      ],
      [
        "taungtha",
        "Taungtha",
        "တောင်သာ",
        "ေတာင္သာ"
      ],
      [
        "gwa",
        "Gwa",
        "ဂွ",
        "ဂြ"
      ],
      [
        "munaung",
        "Munaung",
        "မာန်အောင်",
        "မာန္ေအာင္"
      ],
      [
        "layshi",
        "Layshi",
        "လေရှီး",
        "ေလရွီး"
      ],
      [
        "salin",
        "Salin",
        "စလင်း",
        "စလင္း"
      ],
      [
        "monghpyak",
        "Monghpyak",
        "မိုင်းဖြတ်",
        "မိုင္းျဖတ္"
      ],
      [
        "monghsat",
        "Mong Hsat",
        "မိုင်းဆတ်",
        "မိုင္းဆတ္"
      ],
      [
        "mongkhet",
        "Mongkhet",
        "မိုင်းခတ်",
        "မိုင္းခတ္"
      ],
      [
        "mongla",
        "Mongla",
        "မိုင်းလား",
        "မိုင္းလား"
      ],
      [
        "mongping",
        "Mongping",
        "မိုင်းပြင်း",
        "မိုင္းျပင္း"
      ],
      [
        "mongton",
        "Mongton",
        "မိုင်းတုံ",
        "မိုင္းတုံ"
      ],
      [
        "mongyang",
        "Mongyang",
        "မိူင်းယၢင်း",
        "မိူင္းယၢင္း"
      ],
      [
        "mongyawng",
        "Mongyawng",
        "မိုင်းယောင်း",
        "မိုင္းေယာင္း"
      ],
      [
        "mongmao",
        "Mongmao",
        "မိုင်းမော",
        "မိုင္းေမာ"
      ],
      [
        "namhsan",
        "Namhsan",
        "နမ့်ဆန်",
        "နမ့္ဆန္"
      ],
      [
        "nanhkan",
        "Nanhkan",
        "နမ့်ခမ်း",
        "နမ့္ခမ္း"
      ],
      [
        "hsihseng",
        "Hsihseng",
        "ဆီဆိုင်",
        "ဆီဆိုင္"
      ],
      [
        "laihka",
        "Laihka",
        "လဲချား",
        "လဲခ်ား"
      ],
      [
        "mongkaung",
        "Mongkaung",
        "မိုင်းကိုင်",
        "မိုင္းကိုင္"
      ],
      [
        "mongnai",
        "Mongnai",
        "မိူင်းၼၢႆး",
        "မိူင္းၼၢႆး"
      ],
      [
        "mongpan",
        "Mongpan",
        "မိူင်းပၼ်ႇ",
        "မိူင္းပၼ္ႇ"
      ],
      [
        "twantay",
        "Twantay",
        "တွံတေး",
        "တြံေတး"
      ],
      [
        "taze",
        "Taze",
        "တန့်ဆည်",
        "တန႔္ဆည္"
      ],
      [
        "ye-u",
        "Ye-U",
        "ရေဦး",
        "ေရဦး"
      ]
    ];
        // var territory = [
        //     {
        //         'div': 'div-kachin',
        //         'data':
        //         [
        //             {
        //                 'ky': 'ky-puta-o',
        //                 'data':
        //                 {
        //                     'ts': ['nogmung', 'kawnglanghpu', 'puta-o', 'machanbaw', 'sumprabum']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-myitkyina',
        //                 'data':
        //                 {
        //                     'ts': ['tanai', 'injangyang', 'tsawlaw', 'chipwi', 'myitkyina', 'waingmaw']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-mohnyin',
        //                 'data':
        //                 {
        //                     'ts': ['hpakan', 'mohnyin', 'mogaung']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-bhamo',
        //                 'data':
        //                 {
        //                     'ts': ['momauk', 'shwegu', 'bhamo', 'mansi']
        //                 }
        //             },
        //         ],
        //     },
        //     {
        //         'div': 'div-sagaing',
        //         'data':
        //         [
        //             {
        //                 'ky': 'ky-hkamti',
        //                 'data':
        //                 {
        //                     'ts': ['nanyun', 'lahe', 'hkamti', 'layshi', 'homalin']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-mawlaik',
        //                 'data':
        //                 {
        //                     'ts': ['tamu', 'paungbyin', 'mawlaik']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-katha',
        //                 'data':
        //                 {
        //                     'ts': ['banmauk', 'indaw', 'katha', 'tigyaing', 'pinlebu', 'wuntho', 'kawlin']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-kanbalu',
        //                 'data':
        //                 {
        //                     'ts': ['kyunhla', 'kanbalu']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-kale',
        //                 'data':
        //                 {
        //                     'ts': ['kalewa', 'mingin', 'kale']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-shwebo',
        //                 'data':
        //                 {
        //                     'ts': ['taze', 'ye-u', 'khin-u', 'shwebo', 'tabayin', 'wetlet']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-yinmabin',
        //                 'data':
        //                 {
        //                     'ts': ['kani', 'yinmabin', 'pale', 'salingyi']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-monywa',
        //                 'data':
        //                 {
        //                     'ts': ['budalin', 'ayadaw', 'monywa', 'chaung-u']
        //                 }
        //             },
        //             {
        //                 'ky': 'ky-sagaing',
        //                 'data':
        //                 {
        //                     'ts': ['sagaing', 'myinmu', 'myaung']
        //                 }
        //             },
        //         ],
        //     },
        // ];

        var covids = {
            "positives": [
                {"type": "", "township": "tiddim"},
                {"type": "", "township": "y-thaketa"},
                {"type": "", "township": "y-seikkan"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "y-shwepyithar"},
                {"type": "", "township": "m-chanayethazan"},
                {"type": "", "township": "pyinmana"},
                {"type": "", "township": "y-yankin"},
                {"type": "", "township": "kyaukme"},
                {"type": "", "township": "tonzang"}
            ],
            "quarantine": [
                {"type": "", "township": "y-"},
            ],
            "pos-travel": [
                {"type": "", "township": "y-"},
            ]
        }

        var covids_positives = [
        ]

        var covids_positives_combied = [

        ]

        var covids_positives_combied_color = [

        ]




        //ZawWaiSoe don't change variable names
        var zawvids_positives =
        [{"name":"myittha","puinsuspect":4,"pui":"4","suspected":"0","lab_negative":"27","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":31},{"name":"m-chanayethazan","puinsuspect":37,"pui":"37","suspected":"0","lab_negative":"33","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":74},{"name":"m-chanmyathazi","puinsuspect":26,"pui":"26","suspected":"0","lab_negative":"25","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":52},{"name":"patheingyi","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":3},{"name":"meiktila","puinsuspect":5,"pui":"5","suspected":"0","lab_negative":"1","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":10},{"name":"wundwin","puinsuspect":3,"pui":"1","suspected":"2","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":3},{"name":"nyaung-u","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"kyaukpadaung","puinsuspect":5,"pui":"4","suspected":"1","lab_negative":"2","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":9},{"name":"mogoke","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"pyinoolwin","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"pyawbwe","puinsuspect":1,"pui":"1","suspected":"0","lab_negative":"1","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":2},{"name":"yamethin","puinsuspect":3,"pui":"3","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":5},{"name":"tiddim","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"kyaukme","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"y-northokkalapa","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"4","total_cases":4},{"name":"y-southokkalapa","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"3","total_cases":3},{"name":"y-insein","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"y-mingaladon","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"y-kyeemyindaing","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"y-lanmadaw","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"1","total_cases":2},{"name":"pyinmana","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"taungtha","puinsuspect":2,"pui":"2","suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4}];

        var covid_khayines =
        [{"name":"ky-eyangon","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"11","total_cases":12},{"name":"ky-falam","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"ky-kyaukme","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"ky-kyaukse","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"27","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":31},{"name":"ky-mandalay","pui":"64","puinsuspect":64,"suspected":"0","lab_negative":"60","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"1","total_cases":129},{"name":"ky-meiktila","pui":"6","puinsuspect":8,"suspected":"2","lab_negative":"1","lab_pending":"4","die":"0","recovered":"0","lab_confirmed":"0","total_cases":13},{"name":"ky-myingyan","pui":"2","puinsuspect":2,"suspected":"0","lab_negative":"2","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":4},{"name":"ky-naypyitaw","pui":"0","puinsuspect":0,"suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"ky-nyaung-u","pui":"6","puinsuspect":7,"suspected":"1","lab_negative":"4","lab_pending":"2","die":"0","recovered":"0","lab_confirmed":"0","total_cases":13},{"name":"ky-pyinoolwin","pui":"3","puinsuspect":3,"suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":6},{"name":"ky-yamethin","pui":"4","puinsuspect":4,"suspected":"0","lab_negative":"3","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"0","total_cases":7}];

        var covid_tines =
        [{"name":"div-chin","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1},{"name":"div-mandalay","puinsuspect":92,"pui":"89","suspected":"3","lab_negative":"100","lab_pending":"10","die":"0","recovered":"0","lab_confirmed":"2","total_cases":204},{"name":"div-yangon","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"1","recovered":"0","lab_confirmed":"11","total_cases":12},{"name":"div-nshan","puinsuspect":0,"pui":"0","suspected":"0","lab_negative":"0","lab_pending":"0","die":"0","recovered":"0","lab_confirmed":"1","total_cases":1}];


        var maxDivPos = 13;
        var maxKyPos = 14;
        var maxTsPos = 15;
        var maxDivSus = 16;
        var maxKySus = 17;
        var maxTsSus = 18;


        function tsModeConfirm(zawvids_positives) {

        }

        var toggle = false;




        function disKhayines() {
            for (i in khayines) {
                $('#' + khayines[i]).attr('style', 'display:none;');
            }
        }
        function showKhayines() {
            for (i in khayines) {
                $('#' + khayines[i]).attr('style', 'display:block;');
            }
        }

        function disTownships() {
            for (i in townships) {

                $('#' + townships[i]).attr('style', 'display:none');
            }
            $('#yangon-gp polyline').attr('style', 'display:none');
            $('#mandalay-gp polyline').attr('style', 'display:none');
            $('#yangon-gp path').attr('style', 'display:none');
            $('#mandalay-gp path').attr('style', 'display:none');
        }
        function showTownships() {
            for (i in townships) {
                $('#' + townships[i]).attr('style', 'display:block');
            }
            $('#yangon-gp polyline').attr('style', 'display:block');
            $('#mandalay-gp polyline').attr('style', 'display:block');
            $('#yangon-gp path').attr('style', 'display:block');
            $('#mandalay-gp path').attr('style', 'display:block');
        }


        function disDivisions() {
            for (i in divisions) {
                $('#' + divisions[i]).attr('style', 'display:none');
            }
        }
        function showDivisions() {
            for (i in divisions) {
                $('#' + divisions[i]).attr('style', 'display:block');
            }
        }
        var mode = '';
        function modeTownShips(covidsCombiedColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showTownships();
            for (i in covidsCombiedColor) {
                if(covidsCombiedColor[i].name == 'yangon-gp') {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color)-1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color)-1]);
                    }
                } else if (covidsCombiedColor[i].name == 'mandalay-gp') {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color)-1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name + ' polyline').attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color)-1]);
                    }
                } else {
                    if(!toggle) {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos[parseInt(covidsCombiedColor[i].color)-1]);
                    } else {
                        $('#' + covidsCombiedColor[i].name).attr('style', 'fill:' + cv_pos_sus[parseInt(covidsCombiedColor[i].color)-1]);
                    }
                }

            }
        }
        function modeKhayines(zawPosActKyColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showKhayines();
            colorClassRemover();
            for (i in zawPosActKyColor) {
                var element = document.getElementById(zawPosActKyColor[i].name);
                if(!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActKyColor[i].color)-1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActKyColor[i].color)-1]);
                }
                //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            }
        }

        function modeDivisions(zawPosActDivColor) {
            disKhayines();
            disTownships();
            disDivisions();
            showDivisions();
            colorClassRemover();
            for (i in zawPosActDivColor) {
                var element = document.getElementById(zawPosActDivColor[i].name);
                if(!toggle) {
                    element.classList.add(cv_pos2[parseInt(zawPosActDivColor[i].color)-1]);
                } else {
                    element.classList.add(cv_pos_sus2[parseInt(zawPosActDivColor[i].color)-1]);
                }
                //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            }
            // for (i in covids_positives_combied_color_divisions_mod_color) {
            //     var element = document.getElementById(covids_positives_combied_color_divisions_mod_color[i].name);
            //     element.classList.add(cv_pos2[parseInt(covids_positives_combied_color_divisions_mod_color[i].color)-1]);
            //     //$('#' + covids_positives_combied_color_kharines_color[i].name).attr('style', 'fill:' + cv_pos[parseInt(covids_positives_combied_color_kharines_color[i].color)-1]);
            // }
        }

        function colorClassRemover() {
            if(mode=='ky') {
                for(i in khayines) {
                    element = document.getElementById(khayines[i]);
                    //elements[i].classList.removeClass('fce9e8');
                    element.classList.remove('fce9e8');
                    element.classList.remove('f9d4d2');
                    element.classList.remove('f6bebb');
                    element.classList.remove('f3a9a5');
                    element.classList.remove('f0938e');
                    element.classList.remove('ed7d78');
                    element.classList.remove('ea6861');
                    element.classList.remove('e8524a');
                    element.classList.remove('e74c44');
                    element.classList.remove('e53d34');

                    element.classList.remove('ffd480');
                    element.classList.remove('ffcc66');
                    element.classList.remove('ffc34d');
                    element.classList.remove('ffbb33');
                    element.classList.remove('ffb31a');
                    element.classList.remove('ffaa00');
                    element.classList.remove('e69900');
                    element.classList.remove('cc8800');
                    element.classList.remove('b37700');
                    element.classList.remove('cc96600');
                }
            } else if(mode=='div') {
                for(i in divisions) {
                    element = document.getElementById(divisions[i]);
                    //elements[i].classList.removeClass('fce9e8');
                    element.classList.remove('fce9e8');
                    element.classList.remove('f9d4d2');
                    element.classList.remove('f6bebb');
                    element.classList.remove('f3a9a5');
                    element.classList.remove('f0938e');
                    element.classList.remove('ed7d78');
                    element.classList.remove('ea6861');
                    element.classList.remove('e8524a');
                    element.classList.remove('e74c44');
                    element.classList.remove('e53d34');

                    element.classList.remove('ffd480');
                    element.classList.remove('ffcc66');
                    element.classList.remove('ffc34d');
                    element.classList.remove('ffbb33');
                    element.classList.remove('ffb31a');
                    element.classList.remove('ffaa00');
                    element.classList.remove('e69900');
                    element.classList.remove('cc8800');
                    element.classList.remove('b37700');
                    element.classList.remove('cc96600');
                }
            }


        }


        $( document ).ready(function() {

            //modeTownShips();
            var covidsCombied = [];
            $('.tooltipster').tooltipster({
                animation: 'fade',
                delay:0,
                theme: ['tooltipster-noir', 'tooltipster-noir-customized'],
                trigger: 'click',
                functionAfter: function(instance, helper){

                    // var x = document.getElementById("mobile-svg");
                    // var y = x.getElementsByClassName("hoveredShwe");
                    // var i;
                    // for (i = 0; i < y.length; i++) {
                    //   y[i].classList.remove("hoveredShwe");
                    // }
                }
            });
            var tempColor = '';
            var recentID = '';
            var clickedShwe = false;
            $('#closeResult').on('click', function() {
                $('#searchBox').removeClass('has');
                $('#resultBox').addClass('closed');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }
            });

            $(document).on('click','.search-filter',function(){
                $('#searchBox').removeClass('has');
                $('#resultBox').removeClass('closed');
                $('#searchInput').val($(this).find('span').html());
                $('#searchFilter').html('');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }
                clickedShwe = true;
                var searchItem = $(this).attr("id2");
                window.panZoom.resetZoom();
                window.panZoom.resetPan();
                recentID = searchItem;
                var element = document.getElementById(searchItem);

                element.classList.add("clickedShwe");

                var info = takeInfo(searchItem);
                if(info.length==0) {

                }
                if(mode=='div') {
                    for(i in divisions_mm) {
                        if(divisions_mm[i][0].substr(4) == info[0]) {
                            info[0] = divisions_mm[i][2];
                            break;
                        }
                    }
                } else if(mode=='ky') {
                    for(i in khayines_mm) {
                        if(khayines_mm[i][0].substr(3) == info[0]) {
                            info[0] = khayines_mm[i][2];
                            break;
                        }
                    }
                } else {
                    if(info[0] == 'yangon') {
                        info[0] = 'yangon-gp';
                    } else if(info[0] == 'mandalay') {
                        info[0] = 'mandalay-gp';
                    }
                    for(i in townships_mm) {
                        if(townships_mm[i][0] == info[0]) {
                            info[0] = townships_mm[i][2];
                            break;
                        }
                    }
                }
                $('#resultName').html(info[0]);
                $('#resultPuinsuspect').html(info[1]);
                $('#resultLabnegative').html(info[2]);
                $('#resultLabpending').html(info[3]);
                $('#resultDie').html(info[4]);
                $('#resultRecovered').html(info[5]);
                $('#resultLabconfirmed').html(info[6]);
            });
            function takeInfo(iD) {
                if(mode=='ts') {
                    var info = [];
                    var found = false;
                    for(i in covidsCombined) {
                        if (iD == covidsCombined[i].name) {
                            if(iD == 'yangon-gp') {
                                iD = 'yangon';
                            } else if(iD == 'mandalay-gp') {
                                iD = 'mandalay';
                            }
                            info.push(iD);
                            info.push(covidsCombined[i].puinsuspect);
                            info.push(covidsCombined[i].lab_negative);
                            info.push(covidsCombined[i].lab_pending);
                            info.push(covidsCombined[i].die);
                            info.push(covidsCombined[i].recovered);
                            info.push(covidsCombined[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        if(iD == 'yangon-gp') {
                            iD = 'yangon';
                        } else if(iD == 'mandalay-gp') {
                            iD = 'mandalay';
                        }

                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                } else if(mode=='ky'){
                    var info = [];
                    var found = false;
                    for(i in covid_khayines) {
                        if (iD == covid_khayines[i].name) {
                            var iD = iD.substr(3);
                            info.push(iD);
                            info.push(covid_khayines[i].puinsuspect);
                            info.push(covid_khayines[i].lab_negative);
                            info.push(covid_khayines[i].lab_pending);
                            info.push(covid_khayines[i].die);
                            info.push(covid_khayines[i].recovered);
                            info.push(covid_khayines[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        var iD = iD.substr(3);
                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                } else if(mode=='div'){
                    var info = [];
                    var found = false;
                    for(i in covid_tines) {
                        if (iD == covid_tines[i].name) {
                            var iD = iD.substr(4);
                            info.push(iD);
                            info.push(covid_tines[i].puinsuspect);
                            info.push(covid_tines[i].lab_negative);
                            info.push(covid_tines[i].lab_pending);
                            info.push(covid_tines[i].die);
                            info.push(covid_tines[i].recovered);
                            info.push(covid_tines[i].lab_confirmed);
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        var iD = iD.substr(4);
                        info.push(iD);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                        info.push(0);
                    }
                }

                // if(!found) {
                //     info.push(covids_positives_combied_color[i].name);
                //     info.push(covids_positives_combied_color[i].number);
                //     info.push(covids_positives_combied_color[i].color);
                // }
                return info;
            }
            var recentTtip = 'div-yangon';
            $('.tooltipster').click(function() {
                //var x = document.getElementById("mobile-svg");
                //var y = document.getElementsByClassName("hoveredShwe");
                //var i;
                // for (i = 0; i < y.length; i++) {
                //   y[i].classList.remove("hoveredShwe");
                // }
                console.log(recentTtip);
                document.getElementById(recentTtip).classList.remove('hoveredShwe');

                var undefine = $(this).parent().attr('id');
                var iD = $(this).attr('id');


                setTimeout(function(){
                    if(iD == null) {
                        recentTtip = undefine;
                        var element = document.getElementById(undefine);
                        element.classList.add("hoveredShwe");
                    } else {
                        recentTtip = iD;
                        var element = document.getElementById(iD);
                        element.classList.add("hoveredShwe");
                    }
                    // if (recentID != '') {
                    //     $('.clickedShwe').tooltipster('close');
                    //
                    // }
                    // clickedShwe = false;
                    if (recentID != '') {
                        //document.getElementById(recentID).classList.remove("clickedShwe");
                    }
                    if(mode=="ts") {

                        if(iD==null) {

                            var info = takeInfo(undefine);

                            if(info[0]=='yangon'){
                                info[0]='yangon-gp';
                            } else if(info[0]=='mandalay'){
                                info[0]='mandalay-gp';
                            }

                            for(i in townships_mm) {
                                if(townships_mm[i][0] == info[0]) {
                                    info[0] = townships_mm[i][2];
                                    break;
                                }
                            }
                            if(info.length==0) {

                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                        info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(တွေ့ရှိ)' +
                                        '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စောင့်ကြည့်/သံသယ' +
                                        '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'သေဆုံး' +
                                        '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                        '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'ပြန်လည်ကောင်းမွန်' +
                                        '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(မတွေ့)' +
                                        '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>'
                                );

                            } else {
                                if(info[1]==null) {
                                    info[1]=0;
                                }
                                if(info[2]==null||info[2]=='#fff') {
                                    info[2]=0;
                                }
                                if(info[3]==null) {
                                    info[3]=0;
                                }
                                if(info[4]==null) {
                                    info[4]=0;
                                }
                                if(info[5]==null) {
                                    info[5]=0;
                                }
                                if(info[6]==null) {
                                    info[6]=0;
                                }
                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                        info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(တွေ့ရှိ)' +
                                        '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                            info[6] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စောင့်ကြည့်/သံသယ' +
                                        '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                            info[1] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'သေဆုံး' +
                                        '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                            info[4] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                        '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                            info[3] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'ပြန်လည်ကောင်းမွန်' +
                                        '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                            info[5] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(မတွေ့)' +
                                        '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                            info[2] +
                                        '</span>' +
                                    '</p>'
                                );
                            }


                        } else {

                            var info = takeInfo(iD);
                            for(i in townships_mm) {
                                if(townships_mm[i][0] == info[0]) {
                                    info[0] = townships_mm[i][2];
                                    break;
                                }
                            }

                            if(info.length==0) {

                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                        info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(တွေ့ရှိ)' +
                                        '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စောင့်ကြည့်/သံသယ' +
                                        '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'သေဆုံး' +
                                        '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                        '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'ပြန်လည်ကောင်းမွန်' +
                                        '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(မတွေ့)' +
                                        '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                            '0' +
                                        '</span>' +
                                    '</p>'
                                );

                            } else {
                                if(info[1]==null) {
                                    info[1]=0;
                                }
                                if(info[2]==null||info[2]=='#fff') {
                                    info[2]=0;
                                }
                                if(info[3]==null) {
                                    info[3]=0;
                                }
                                if(info[4]==null) {
                                    info[4]=0;
                                }
                                if(info[5]==null) {
                                    info[5]=0;
                                }
                                if(info[6]==null) {
                                    info[6]=0;
                                }
                                $('.tooltipster-content').html(
                                    '<p class="font-weight-bold mb-1">' +
                                        info[0] +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(တွေ့ရှိ)' +
                                        '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                            info[6] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စောင့်ကြည့်/သံသယ' +
                                        '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                            info[1] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'သေဆုံး' +
                                        '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                            info[4] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                        '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                            info[3] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'ပြန်လည်ကောင်းမွန်' +
                                        '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                            info[5] +
                                        '</span>' +
                                    '</p>' +
                                    '<p class="font-size-sm text-muted mb-0">' +
                                        'စစ်ဆေး(မတွေ့)' +
                                        '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                            info[2] +
                                        '</span>' +
                                    '</p>'
                                );
                            }
                        }
                    } else if(mode == 'ky') {
                        if(iD==null) {

                            var info = takeInfo(undefine);
                            for(i in khayines_mm) {
                                if(khayines_mm[i][0].substr(3) == info[0]) {
                                    info[0] = khayines_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                        info[6] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                        info[1] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                        info[4] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                        info[3] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                        info[5] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                        info[2] +
                                    '</span>' +
                                '</p>'
                            );
                        } else {
                            var info = takeInfo(iD);
                            for(i in khayines_mm) {
                                if(khayines_mm[i][0].substr(3) == info[0]) {
                                    info[0] = khayines_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                        info[6] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                        info[1] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                        info[4] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                        info[3] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                        info[5] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                        info[2] +
                                    '</span>' +
                                '</p>'
                            );
                        }
                    } else if(mode == 'div') {
                        if(iD==null) {
                            var info = takeInfo(undefine);
                            for(i in divisions_mm) {
                                if(divisions_mm[i][0].substr(4) == info[0]) {
                                    info[0] = divisions_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                        info[6] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                        info[1] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                        info[4] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                        info[3] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                        info[5] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                        info[2] +
                                    '</span>' +
                                '</p>'
                            );
                        } else {
                            var info = takeInfo(iD);
                            for(i in divisions_mm) {
                                if(divisions_mm[i][0].substr(4) == info[0]) {
                                    info[0] = divisions_mm[i][2];
                                    break;
                                }
                            }
                            $('.tooltipster-content').html(
                                '<p class="font-weight-bold mb-1">' +
                                    info[0] +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(တွေ့ရှိ)' +
                                    '<span class="badge badge-rounded-circle badge-danger-soft" bis_skin_checked="1">' +
                                        info[6] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စောင့်ကြည့်/သံသယ' +
                                    '<span class="badge badge-rounded-circle badge-warning-soft" bis_skin_checked="1">' +
                                        info[1] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'သေဆုံး' +
                                    '<span class="badge badge-rounded-circle badge-dark-soft" bis_skin_checked="1">' +
                                        info[4] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(စောင့်ဆိုင်း)' +
                                    '<span class="badge badge-rounded-circle badge-primary-soft" bis_skin_checked="1">' +
                                        info[3] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'ပြန်လည်ကောင်းမွန်' +
                                    '<span class="badge badge-rounded-circle badge-secondary-soft" bis_skin_checked="1">' +
                                        info[5] +
                                    '</span>' +
                                '</p>' +
                                '<p class="font-size-sm text-muted mb-0">' +
                                    'စစ်ဆေး(မတွေ့)' +
                                    '<span class="badge badge-rounded-circle badge-success-soft" bis_skin_checked="1">' +
                                        info[2] +
                                    '</span>' +
                                '</p>'
                            );
                        }
                    }
                }, 0);
                //$('.tooltipster-content').html('WTF');


            });
            window.panZoom = svgPanZoom('#mobile-svg', {
              zoomEnabled: true
            , controlIconsEnabled: true
            , fit: 1
            , center: 1
            , minZoom: 0.7
            , maxZoom: 6
            , refreshRate: 'auto'
            , customEventsHandler: eventsHandler
            , onZoom: function(){
                $('.tooltipster').tooltipster('close');
                //$('#'+recentID).attr('style',tempColor);
                document.getElementById(recentTtip).classList.remove("hoveredShwe");

            }
            });

            document.getElementById('mobile-svg').addEventListener('mousedown', start_drag);
            function start_drag() {
                //console.log(window.panZoom.getTransform());
                setTimeout(function(){
                    document.getElementById(recentTtip).classList.remove("hoveredShwe");
                }, 0);
            }

            function idToName(idAtt) {
                var newName;

                idAtt = idAtt.replace('div-','');
                idAtt = idAtt.replace('ky-','');
                idAtt = idAtt.replace('-gp','');
                return idAtt;
            }

            function zoomAtKachin() {
                window.panZoom.zoomAtPoint(3, {x: 750, y: -40});
            }
            function zoomAtSagaingTop() {
                window.panZoom.zoomAtPoint(3, {x: 620, y: 0});
            }
            //zoomAtKachin();
            //zoomAtSagaingTop();
            //window.panZoom.pan({x: 50, y: 50})


            $('#zoomIn').on('click', function() {
                window.panZoom.zoomIn();
            });
            $('#zoomReset').on('click', function() {
                window.panZoom.resetZoom();
                window.panZoom.resetPan();
            });
            $('#zoomOut').on('click', function() {
                window.panZoom.zoomOut();
            });

            $('polyline').on('click', function() {
            });

            $('#svg-pan-zoom-controls').attr('style', 'display: none;');

            // $('#div-eshan').addClass('tooltipster');
            // function addTooltips() {
            //     for (i in divisions) {
            //         $('#' + divisions[i]).tooltipster({
            //            animation: 'fade',
            //            delay: 500,
            //            theme: ['tooltipster-noir', 'tooltipster-noir-customized'],
            //            trigger: 'hover'
            //         });
            //     }
            // }
            // addTooltips();

            $('#closeSearch').on('click', function() {
                $('#searchBtnBox').removeClass('close');
                $('#searchBox').addClass('close');
                $('#totalBoxm').removeClass('close');
            });
            $('#searchBtnBox').on('click', function() {
                $('#searchBtnBox').addClass('close');
                $('#searchBox').removeClass('close');
                if($('#searchBox').hasClass('mobile')) {
                    $('#totalBoxm').addClass('close');
                }
            });
            var ttTownships = [];
            for(i in territories) {
                for(j in territories[i].data) {
                    for(k in territories[i].data[j].data.ts) {
                        ttTownships.push(territories[i].data[j].data.ts[k]);
                    }
                }
            }

            ttTownships.splice( $.inArray('y-ahlone', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-bahan', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-botahtaung', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-cocokyun', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dagon', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dagonmyothitea', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dagonmyothitno', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dagonmyothitse', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dagonmyothitso', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dala', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-dawbon', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-hlaing', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-hlaingtharya', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-kyeemyindaing', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-mingaladon', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-mingalartaungnyunt', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-northokkalapa', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-pabedan', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-pazundaung', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-seikgyikanaungto', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-seikkan', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-shwepyithar', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-tamwe', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-thingangkuun', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-yankin', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-mayangone', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-insein', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-kamaryut', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-lanmadaw', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-latha', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-sanchaung', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-southokkalapa', ttTownships), 1 );
            ttTownships.splice( $.inArray('y-thaketa', ttTownships), 1 );
            ttTownships.push('yangon-gp');


            ttTownships.splice( $.inArray('m-aungmyaythazan', ttTownships), 1 );
            ttTownships.splice( $.inArray('m-chanayethazan', ttTownships), 1 );
            ttTownships.splice( $.inArray('m-chanmyathazi', ttTownships), 1 );
            ttTownships.splice( $.inArray('m-mahaaungmyay', ttTownships), 1 );
            ttTownships.splice( $.inArray('m-pyigyitagon', ttTownships), 1 );

            ttTownships.push('mandalay-gp');

            ttTownships.sort();
            ttTownships = townships_mm;
            console.log(ttTownships);
            var ttKhayines = [];
            for(i in territories) {
                for(j in territories[i].data) {
                    ttKhayines.push(territories[i].data[j].ky);
                }
            }
            ttKhayines.sort();

            var ttDivisions = [];
            for(i in territories) {
                ttDivisions.push(territories[i].div);
            }
            ttDivisions.sort();
            ttDivisions = divisions_mm;
            ttKhayines = khayines_mm;
            $('#searchInput').on('focus', function() {
                if ($(this).val() != '') {
                    $('#searchBox').addClass('has');
                } else {
                    $('#searchBox').removeClass('has');
                }
                $('#resultBox').addClass('closed');
                if (recentID != '') {
                    document.getElementById(recentID).classList.remove("clickedShwe");
                }

                if ($(this).val() != '') {
                    var tempSearch = [];max = 0;
                    if(mode == 'ts') {
                        for (i in ttTownships) {
                            if ((ttTownships[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttTownships[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                                tempSearch.push(ttTownships[i]);
                                max ++;
                            }
                        }
                    } else if(mode == 'ky') {
                        for (i in ttKhayines) {
                            if ((ttKhayines[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttKhayines[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                                tempSearch.push(ttKhayines[i]);
                                max ++;
                            }
                        }
                    } else {
                        for (i in ttDivisions) {
                            if ((ttDivisions[i][1].indexOf($(this).val()) >= 0 && max<5) || (ttDivisions[i][2].indexOf($(this).val()) >= 0 && max<5)) {
                                tempSearch.push(ttDivisions[i]);
                                max ++;
                            }
                        }
                    }
                    var searchDivs = ''
                    for(i in tempSearch) {
                        // searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + idToName(tempSearch[i]) + '</span></div>'
                        searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i][0] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + tempSearch[i][2] + '</span></div>'
                    }
                    if (searchDivs == '') {
                        searchDivs = '<div style="z-index:1;" class=""><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;color: #8c8c8c">no result</span></div>';
                    }
                    $('#searchFilter').html(searchDivs);
                } else {
                    $('#searchFilter').html('');
                }
            });


            function myFunction1(x) {
              if (x.matches) { // If media query matches
                  $('.navbar').addClass('change');
                  $('.myanmar-map').addClass('mobile');
                  $('#map-container').addClass('mobile');
                  $('#scroll-down').removeClass('not-mobile');
                  $('#color-bar-con').addClass('mobile');
                  $('#color-range-con').addClass('mobile');
              } else {
                  $('.navbar').removeClass('change');
                  $('.myanmar-map').removeClass('mobile');
                  $('#map-container').removeClass('mobile');
                  $('#scroll-down').addClass('not-mobile');
                  $('#color-bar-con').removeClass('mobile');
                  $('#color-range-con').removeClass('mobile');
              }
            }
            var x = window.matchMedia("(max-width: 767px)")
            myFunction1(x) // Call listener function at run time
            x.addListener(myFunction1)

            function myFunction2(x) {
              if (x.matches) {
                  $('.myanmar-map').addClass('tablet');
                  $('#map-container').addClass('tablet');
              } else {
                  $('.myanmar-map').removeClass('tablet');
                  $('#map-container').removeClass('tablet');
              }
            }
            var x = window.matchMedia("(max-width: 991px)")
            myFunction2(x) // Call listener function at run time
            x.addListener(myFunction2)

            $('#searchInput').on('keyup', function() {
                if ($(this).val() != '') {
                    $('#searchBox').addClass('has');
                } else {
                    $('#searchBox').removeClass('has');
                }
                // $('#resultBox').
                $('#resultBox').addClass('closed');
                if ($(this).val() != '') {
                    var tempSearch = [];max = 0;
                    if(mode == 'ts') {
                        for (i in ttTownships) {
                            if ((ttTownships[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttTownships[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                                tempSearch.push(ttTownships[i]);
                                max ++;
                            }
                        }
                    } else if(mode == 'ky') {
                        for (i in ttKhayines) {
                            if ((ttKhayines[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttKhayines[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                                tempSearch.push(ttKhayines[i]);
                                max ++;
                            }
                        }
                    } else {
                        for (i in ttDivisions) {
                            if ((ttDivisions[i][1].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5) || (ttDivisions[i][2].toLowerCase().indexOf($(this).val().toLowerCase()) >= 0 && max<5)) {
                                tempSearch.push(ttDivisions[i]);
                                max ++;
                            }
                        }
                    }
                    console.log(tempSearch);
                    var searchDivs = ''
                    for(i in tempSearch) {
                        // searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + idToName(tempSearch[i]) + '</span></div>'
                        searchDivs += '<div style="z-index:1;" class="shwe-button search-filter" id2="' + tempSearch[i][0] + '"><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;">' + tempSearch[i][2] + '</span></div>'
                    }
                    if (searchDivs == '') {
                        searchDivs = '<div style="z-index:1;" class=""><button style="margin-top: 5px; margin-bottom: 5px; border: 0;width: 72px; height: 30px; background: #fff;display: table-cell; vertical-align: middle;"></button><span style="margin-left: 10px;font-size: 17px;color: #8c8c8c">no result</span></div>';
                    }
                    $('#searchFilter').html(searchDivs);
                } else {
                    $('#searchFilter').html('');
                }
            });



            function triggerEvent( elem, event ) {
              var clickEvent = new Event( event ); // Create the event.
              elem.dispatchEvent( clickEvent );    // Dispatch the event.
            }

            //$('#pyinmana').trigger('mouseover');
			//$("ins[data-radio|='option5']").trigger('click');


            setTimeout(function(){
                $('#page-loader').addClass('close');
            }, 500);

            });

            function changeColorBar(number) {
                console.log('fuck');
                var x = document.getElementsByClassName("color-bar");
                var y = document.getElementsByClassName("color-range");
                var i,j;
                console.log(toggle);
                if(!toggle) {
                    for (i = 0; i < x.length; i++) {
                      x[i].setAttribute('style', 'background:' + cv_pos[i] + ';');
                    }
                } else {
                    for (i = 0; i < x.length; i++) {
                      x[i].setAttribute('style', 'background:' + cv_pos_sus[i] + ';');
                    }
                }
                var start = 0;
                var range = parseInt(number)/10;
                for (i = 0; i < y.length; i++) {
                    console.log(start);
                    if(i==y.length-1) {
                        y[i].innerHTML = Math.ceil(start) + '-' + (number+1);
                    } else {
                        y[i].innerHTML = Math.ceil(start) + '-' + Math.ceil(start+range);
                    }
                    start=start+range;
                }

            }

            changeColorBar(maxDivPos);


            $("#radios").radiosToSlider();
            $("#radios").radiosToSlider({
              size: 'medium',
              animation: true,
              fitContainer: true,
              isDisable: false,
              onSelect: 0
            });

            $('#mode-tine').on('click', function() {
                $('.mode-btn').removeClass('active');
                $(this).addClass('active');
                //modeDivisions();
                mode='div';
                changeAll();
                $('#searchInput').val('');
                $('#searchFilter').html('');
                $('#searchInput').attr("placeholder", "တိုင်းဒေသကြီး ရှာဖွေရန်");
            });
            $('#mode-khayine').on('click', function() {
                $('.mode-btn').removeClass('active');
                $(this).addClass('active');
                // modeKhayines(covids_khayines_color);
                mode='ky';
                changeAll();
                $('#searchInput').val('');
                $('#searchFilter').html('');
                $('#searchInput').attr("placeholder", "ခရိုင် ရှာဖွေရန်");
            });
            $('#mode-township').on('click', function() {
                $('.mode-btn').removeClass('active');
                $(this).addClass('active');
                //modeTownShips(covids_combied_color);
                mode='ts';
                changeAll();
                $('#searchInput').val('');
                $('#searchFilter').html('');
                $('#searchInput').attr("placeholder", "မြို့နယ် ရှာဖွေရန်");
            });
            var covids_combied = [];
            var covids_combied_color = [];

            var covids_khayines_color = [];
            $('#mode-tine').trigger('click');

            $('#toggle-switch').on('change', function() {
                toggle = $(this).prop('checked');
                changeAll();
            });

            $('#toggle-switch').trigger('click');
            $('#toggle-switch').trigger('click');

            function changeAll() {
                if(mode=='div') {
                    function info2MapDiv(covid_tines, toggle) {
                        if(!toggle) {
                            changeColorBar(maxDivPos);
                            covids_tines_color = [];
                            var posMax3 = parseInt(covid_tines[0].lab_confirmed);
                            for (i in covid_tines) {
                                if(posMax3 < parseInt(covid_tines[i].lab_confirmed)) {
                                    posMax3 = covid_tines[i++].lab_confirmed;
                                }
                            }
                            //var zawPosActKyColor = [];
                            for (i in covid_tines) {
                                var colorCode = parseInt((covid_tines[i].lab_confirmed/posMax3)*10);
                                if(colorCode == 0) {
                                    colorCode = 1;
                                }
                                if(covid_tines[i].lab_confirmed != 0) {
                                    covids_tines_color.push({"name": covid_tines[i].name, "number": covid_tines[i].lab_confirmed, "color": colorCode})
                                }
                            }

                        } else {
                            changeColorBar(maxDivSus);
                            covids_tines_color = [];
                            var posMax3 = parseInt(covid_tines[0].puinsuspect);
                            for (i in covid_tines) {
                                if(posMax3 < parseInt(covid_tines[i].puinsuspect)) {
                                    posMax3 = covid_tines[i++].puinsuspect;
                                }
                            }
                            //var zawPosActKyColor = [];
                            for (i in covid_tines) {
                                var colorCode = parseInt((covid_tines[i].puinsuspect/posMax3)*10);
                                if(colorCode == 0) {
                                    colorCode = 1;
                                }
                                if(covid_tines[i].puinsuspect != 0) {
                                    covids_tines_color.push({"name": covid_tines[i].name, "number": covid_tines[i].puinsuspect, "color": colorCode})
                                }

                            }
                        }
                        return covids_tines_color;
                    }
                    var covidsCombiedColorDiv = [];
                    covidsCombiedColorDiv = info2MapDiv(covid_tines, toggle);
                    modeDivisions(covidsCombiedColorDiv);
                } else if(mode=='ky') {
                    function info2MapKy(covid_khayines, toggle) {
                        if(!toggle) {
                            changeColorBar(maxKyPos);
                            covids_khayines_color = [];
                            var posMax2 = parseInt(covid_khayines[0].lab_confirmed);
                            for (i in covid_khayines) {
                                if(posMax2 < parseInt(covid_khayines[i].lab_confirmed)) {
                                    posMax2 = covid_khayines[i++].lab_confirmed;
                                }
                            }
                            //var zawPosActKyColor = [];
                            for (i in covid_khayines) {
                                var colorCode = parseInt((covid_khayines[i].lab_confirmed/posMax2)*10);
                                if(colorCode == 0) {
                                    colorCode = 1;
                                }
                                if(covid_khayines[i].lab_confirmed != 0) {
                                    covids_khayines_color.push({"name": covid_khayines[i].name, "number": covid_khayines[i].lab_confirmed, "color": colorCode})
                                }
                            }

                        } else {
                            changeColorBar(maxKySus);
                            covids_khayines_color = [];
                            var posMax2 = parseInt(covid_khayines[0].puinsuspect);
                            for (i in covid_khayines) {
                                if(posMax2 < parseInt(covid_khayines[i].puinsuspect)) {
                                    posMax2 = covid_khayines[i++].puinsuspect;
                                }
                            }
                            //var zawPosActKyColor = [];
                            for (i in covid_khayines) {
                                var colorCode = parseInt((covid_khayines[i].puinsuspect/posMax2)*10);
                                if(colorCode == 0) {
                                    colorCode = 1;
                                }
                                if(covid_khayines[i].puinsuspect != 0) {
                                    covids_khayines_color.push({"name": covid_khayines[i].name, "number": covid_khayines[i].puinsuspect, "color": colorCode})
                                }

                            }
                        }
                        return covids_khayines_color;
                    }
                    var covidsCombiedColorKy = [];
                    covidsCombiedColorKy = info2MapKy(covid_khayines, toggle);
                    modeKhayines(covidsCombiedColorKy);
                } else {
                    function info2MapTs(zawvids_positives, toggle) {
                        var covids_combied = [];
                        var covids_combied_color = [];
                        if(!toggle) {
                            changeColorBar(maxTsPos);
                            for (i in zawvids_positives) {
                                if ( !(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                    covids_combied.push({"name": zawvids_positives[i].name, "number": zawvids_positives[i].lab_confirmed, "puinsuspect": zawvids_positives[i].puinsuspect, "pui": zawvids_positives[i].pui, "suspected": zawvids_positives[i].suspected, "lab_negative": zawvids_positives[i].lab_negative, "lab_pending": zawvids_positives[i].lab_pending, "die": zawvids_positives[i].die, "recovered": zawvids_positives[i].recovered, "lab_confirmed": zawvids_positives[i].lab_confirmed});
                                }
                            }

                            var mpuinsuspect = 0;
                            var mpui = 0;
                            var msuspected = 0;
                            var mlab_negative = 0;
                            var mlab_pending = 0;
                            var mdie = 0;
                            var mrecovered = 0;
                            var mlab_confirmed = 0;
                            for (i in zawvids_positives) {
                                if (zawvids_positives[i].name.indexOf("m-") >= 0) {
                                    mpuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                    mpui += parseInt(zawvids_positives[i].pui);
                                    msuspected += parseInt(zawvids_positives[i].suspected);
                                    mlab_negative += parseInt(zawvids_positives[i].lab_negative);
                                    mlab_pending += parseInt(zawvids_positives[i].lab_pending);
                                    mdie += parseInt(zawvids_positives[i].die);
                                    mrecovered += parseInt(zawvids_positives[i].recovered);
                                    mlab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                                }
                            }
                            covids_combied.push({"name": "mandalay-gp", "number": mlab_confirmed, "puinsuspect": mpuinsuspect, "pui": mpui, "suspected": msuspected, "lab_negative": mlab_negative, "lab_pending": mlab_pending, "die": mdie, "recovered": mrecovered, "lab_confirmed": mlab_confirmed});
                            // if(mnum > 0) {
                            //
                            // }

                            var ypuinsuspect = 0;
                            var ypui = 0;
                            var ysuspected = 0;
                            var ylab_negative = 0;
                            var ylab_pending = 0;
                            var ydie = 0;
                            var yrecovered = 0;
                            var ylab_confirmed = 0;
                            for (i in zawvids_positives) {
                                if (zawvids_positives[i].name.indexOf("y-") >= 0) {
                                    ypuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                    ypui += parseInt(zawvids_positives[i].pui);
                                    ysuspected += parseInt(zawvids_positives[i].suspected);
                                    ylab_negative += parseInt(zawvids_positives[i].lab_negative);
                                    ylab_pending += parseInt(zawvids_positives[i].lab_pending);
                                    ydie += parseInt(zawvids_positives[i].die);
                                    yrecovered += parseInt(zawvids_positives[i].recovered);
                                    ylab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                                }
                            }
                            covids_combied.push({"name": "yangon-gp", "number": ylab_confirmed, "puinsuspect": ypuinsuspect, "pui": ypui, "suspected": ysuspected, "lab_negative": ylab_negative, "lab_pending": ylab_pending, "die": ydie, "recovered": yrecovered, "lab_confirmed": ylab_confirmed});
                        } else {
                            changeColorBar(maxTsSus);
                            for (i in zawvids_positives) {
                                if ( !(zawvids_positives[i].name.indexOf("m-") >= 0) && !(zawvids_positives[i].name.indexOf("y-") >= 0)) {
                                    covids_combied.push({"name": zawvids_positives[i].name, "number": zawvids_positives[i].puinsuspect, "puinsuspect": zawvids_positives[i].puinsuspect, "pui": zawvids_positives[i].pui, "suspected": zawvids_positives[i].suspected, "lab_negative": zawvids_positives[i].lab_negative, "lab_pending": zawvids_positives[i].lab_pending, "die": zawvids_positives[i].die, "recovered": zawvids_positives[i].recovered, "lab_confirmed": zawvids_positives[i].lab_confirmed});
                                }
                            }

                            var mpuinsuspect = 0;
                            var mpui = 0;
                            var msuspected = 0;
                            var mlab_negative = 0;
                            var mlab_pending = 0;
                            var mdie = 0;
                            var mrecovered = 0;
                            var mlab_confirmed = 0;
                            for (i in zawvids_positives) {
                                if (zawvids_positives[i].name.indexOf("m-") >= 0) {
                                    mpuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                    mpui += parseInt(zawvids_positives[i].pui);
                                    msuspected += parseInt(zawvids_positives[i].suspected);
                                    mlab_negative += parseInt(zawvids_positives[i].lab_negative);
                                    mlab_pending += parseInt(zawvids_positives[i].lab_pending);
                                    mdie += parseInt(zawvids_positives[i].die);
                                    mrecovered += parseInt(zawvids_positives[i].recovered);
                                    mlab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                                }
                            }
                            covids_combied.push({"name": "mandalay-gp", "number": mpuinsuspect, "puinsuspect": mpuinsuspect, "pui": mpui, "suspected": msuspected, "lab_negative": mlab_negative, "lab_pending": mlab_pending, "die": mdie, "recovered": mrecovered, "lab_confirmed": mlab_confirmed});
                            // if(mnum > 0) {
                            //
                            // }

                            var ypuinsuspect = 0;
                            var ypui = 0;
                            var ysuspected = 0;
                            var ylab_negative = 0;
                            var ylab_pending = 0;
                            var ydie = 0;
                            var yrecovered = 0;
                            var ylab_confirmed = 0;
                            for (i in zawvids_positives) {
                                if (zawvids_positives[i].name.indexOf("y-") >= 0) {
                                    ypuinsuspect += parseInt(zawvids_positives[i].puinsuspect);
                                    ypui += parseInt(zawvids_positives[i].pui);
                                    ysuspected += parseInt(zawvids_positives[i].suspected);
                                    ylab_negative += parseInt(zawvids_positives[i].lab_negative);
                                    ylab_pending += parseInt(zawvids_positives[i].lab_pending);
                                    ydie += parseInt(zawvids_positives[i].die);
                                    yrecovered += parseInt(zawvids_positives[i].recovered);
                                    ylab_confirmed += parseInt(zawvids_positives[i].lab_confirmed);
                                }
                            }
                            covids_combied.push({"name": "yangon-gp", "number": ypuinsuspect, "puinsuspect": ypuinsuspect, "pui": ypui, "suspected": ysuspected, "lab_negative": ylab_negative, "lab_pending": ylab_pending, "die": ydie, "recovered": yrecovered, "lab_confirmed": ylab_confirmed});
                        }
                        covidsCombined = covids_combied;
                        console.log(covids_combied);
                        var posMax = parseInt(covids_combied[0].number);
                        for (i in covids_combied) {
                            if(posMax < parseInt(covids_combied[i].number)) {
                                posMax = parseInt(covids_combied[i++].number);
                            }
                        }
                        for (i in covids_combied) {
                            var colorCode = parseInt((parseInt(covids_combied[i].number)/posMax)*10);
                            if(colorCode == 0) {
                                colorCode = 1;
                            }
                            if(parseInt(covids_combied[i].number) != 0) {
                                covids_combied_color.push({"name": covids_combied[i].name, "number": parseInt(covids_combied[i].number), "color": colorCode});
                            }
                        }
                        return covids_combied_color;
                    }
                    var covidsCombiedColor = info2MapTs(zawvids_positives, toggle);
                    console.log(covidsCombiedColor);
                    modeTownShips(covidsCombiedColor);
                }
            }

};
