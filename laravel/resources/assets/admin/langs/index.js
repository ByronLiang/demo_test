import enLocale from './en';
import cnLocal from './cn';
import jaLocal from './ja';
import elementEnLocale from 'element-ui/lib/locale/lang/en' // element-ui lang
import elementZhLocale from 'element-ui/lib/locale/lang/zh-CN'// element-ui lang
import elementJaLocale from 'element-ui/lib/locale/lang/ja'// element-ui lang

export default {
    en: {
        ...enLocale,
        ...elementEnLocale
    },
    cn: {
        ...cnLocal,
        ...elementZhLocale
    },
    ja: {
        ...elementJaLocale,
        ...jaLocal
    }
}
