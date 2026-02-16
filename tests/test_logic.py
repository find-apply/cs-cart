"""
CS-Cart project logic tests.

Validates project structure, file integrity, and configuration sanity.
"""

import os
import re
import unittest

PROJECT_ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))


class TestProjectStructure(unittest.TestCase):
    """Verify essential project files and directories exist."""

    REQUIRED_FILES = [
        "index.php",
        "admin.php",
        "api.php",
        "config.php",
        "config.local.php",
        "init.php",
        "vendor.php",
    ]

    REQUIRED_DIRS = [
        "app",
        "design",
        "images",
        "js",
        "var",
        "install",
    ]

    def test_required_files_exist(self):
        for fname in self.REQUIRED_FILES:
            path = os.path.join(PROJECT_ROOT, fname)
            self.assertTrue(os.path.isfile(path), f"Missing required file: {fname}")

    def test_required_directories_exist(self):
        for dname in self.REQUIRED_DIRS:
            path = os.path.join(PROJECT_ROOT, dname)
            self.assertTrue(os.path.isdir(path), f"Missing required directory: {dname}")


class TestConfigIntegrity(unittest.TestCase):
    """Validate configuration files are well-formed."""

    def _read(self, filename):
        with open(os.path.join(PROJECT_ROOT, filename), "r") as f:
            return f.read()

    def test_config_php_starts_with_php_tag(self):
        content = self._read("config.php")
        self.assertTrue(content.strip().startswith("<?php"), "config.php must start with <?php")

    def test_config_local_php_starts_with_php_tag(self):
        content = self._read("config.local.php")
        self.assertTrue(content.strip().startswith("<?php"), "config.local.php must start with <?php")

    def test_init_defines_min_php_version(self):
        content = self._read("init.php")
        self.assertIn("MIN_PHP_VERSION", content, "init.php should define MIN_PHP_VERSION")

    def test_init_defines_max_php_version(self):
        content = self._read("init.php")
        self.assertIn("MAX_PHP_VERSION", content, "init.php should define MAX_PHP_VERSION")


class TestEntryPointSecurity(unittest.TestCase):
    """Check that entry-point PHP files include bootstrap guards."""

    def _read(self, filename):
        with open(os.path.join(PROJECT_ROOT, filename), "r") as f:
            return f.read()

    def test_config_has_bootstrap_check(self):
        content = self._read("config.php")
        self.assertIn("BOOTSTRAP", content, "config.php should check for BOOTSTRAP constant")

    def test_index_php_is_valid(self):
        content = self._read("index.php")
        self.assertTrue(content.strip().startswith("<?php"), "index.php must start with <?php")


class TestThemeStructure(unittest.TestCase):
    """Verify theme directories contain expected layout."""

    THEMES_DIR = os.path.join(PROJECT_ROOT, "var", "themes_repository")

    def test_themes_directory_exists(self):
        self.assertTrue(os.path.isdir(self.THEMES_DIR), "themes_repository directory should exist")

    def test_at_least_one_theme_present(self):
        if not os.path.isdir(self.THEMES_DIR):
            self.skipTest("themes_repository not found")
        themes = [
            d for d in os.listdir(self.THEMES_DIR)
            if os.path.isdir(os.path.join(self.THEMES_DIR, d))
        ]
        self.assertGreater(len(themes), 0, "At least one theme should be present")

    def test_themes_have_manifest(self):
        if not os.path.isdir(self.THEMES_DIR):
            self.skipTest("themes_repository not found")
        themes = [
            d for d in os.listdir(self.THEMES_DIR)
            if os.path.isdir(os.path.join(self.THEMES_DIR, d))
        ]
        for theme in themes:
            manifest = os.path.join(self.THEMES_DIR, theme, "manifest.json")
            self.assertTrue(
                os.path.isfile(manifest),
                f"Theme '{theme}' is missing manifest.json",
            )


class TestNoSensitiveFiles(unittest.TestCase):
    """Ensure no sensitive files are exposed in the project root."""

    SENSITIVE_PATTERNS = [
        ".env",
        ".git/config",
        "id_rsa",
        "id_ed25519",
    ]

    def test_no_exposed_sensitive_files(self):
        for pattern in self.SENSITIVE_PATTERNS:
            path = os.path.join(PROJECT_ROOT, pattern)
            if pattern == ".git/config":
                continue  # .git/config is expected in a git repo
            self.assertFalse(
                os.path.isfile(path),
                f"Sensitive file should not exist in project root: {pattern}",
            )


if __name__ == "__main__":
    unittest.main()
