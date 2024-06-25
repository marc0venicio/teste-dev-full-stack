
import { createVuetify, type ThemeDefinition } from 'vuetify'
import { es, pt } from 'vuetify/locale'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import * as labs from 'vuetify/labs/components'
import '@mdi/font/css/materialdesignicons.min.css'
import 'vuetify/dist/vuetify.min.css'

const customTheme: ThemeDefinition = {
  dark: false,
  colors: {
    deepteal50: '#f1fcf9',
    deepteal100: '#cff8ed',
    deepteal200: '#9ff0dc',
    deepteal300: '#67e1c7',
    deepteal400: '#37caaf',
    deepteal500: '#1eae96',
    deepteal600: '#158c7b',
    deepteal700: '#157064',
    deepteal800: '#165951',
    deepteal900: '#123b36',
    deepteal950: '#072c29'
  }
}

export const vuetify = createVuetify({
  components: {
    ...labs,
    ...components
  },
  directives,
  icons: {
    defaultSet: 'mdi',
    aliases,
    sets: {
      mdi
    }
  },
  theme: {
    defaultTheme: 'customTheme',
    themes: {
      customTheme
    }
  },
  locale: {
    locale: 'pt',
    fallback: 'pt',
    messages: { pt }
  }
})
