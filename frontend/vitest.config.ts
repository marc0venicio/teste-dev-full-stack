import { fileURLToPath } from 'node:url'
import viteConfig from './vite.config'
import { mergeConfig, defineConfig, configDefaults } from 'vitest/config'

export default mergeConfig(
  viteConfig,
  defineConfig({
    test: {
      environment: 'jsdom',
      exclude: [...configDefaults.exclude, 'e2e/*'],
      root: fileURLToPath(new URL('./', import.meta.url)),
      coverage: {
        provider: 'v8',
        reportsDirectory: './test/coverage',
        reporter: ['json-summary', 'html-spa']
      }
    }
  })
)
